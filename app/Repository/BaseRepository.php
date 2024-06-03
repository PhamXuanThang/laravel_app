<?php

namespace App\Repository;

use App\Repository\Contracts\RepositoryInterface;
use Exception;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var
     */
    protected mixed $model;

    /**
     * @throws Exception
     */
    public function __construct(protected Application $app)
    {
        $this->makeModel();
    }


    /**
     * Returns the current Model instance
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @throws Exception
     */
    public function resetModel(): void
    {
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model(): string;

    /**
     * @return Model
     * @throws Exception
     */
    public function makeModel(): Model
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Retrieve all data of repository, paginated
     * @param int|null $limit
     * @param array $columns
     * @param string $method
     * @return mixed
     * @throws Exception
     */
    public function paginate(int $limit = null, array $columns = ['*'], string $method = "paginate"): mixed
    {
        $results = $this->model->{$method}($limit, $columns);
        $results->appends(app('request')->query());
        $this->resetModel();

        return $results;
    }

    /**
     * Save a new entity in repository
     * @param array $attributes
     * @return mixed
     * @throws Exception
     */
    public function create(array $attributes): mixed
    {
        $attributes = $this->model->newInstance()->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();
        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();

        return $model;
    }

    /**
     * Find data by id
     * @param mixed $id
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function find(mixed $id, array $columns = ['*']): mixed
    {
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();

        return $model;
    }

    /**
     * Update a entity in repository by id
     * @param array $attributes
     * @param mixed $id
     * @return mixed
     * @throws Exception
     */
    public function update(mixed $id, array $attributes): mixed
    {
        $model = $this->model->newInstance();
        $model->setRawAttributes([]);
        $model->setAppends([]);
        $attributes = $model->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();
        $this->resetModel();

        return $model;
    }

    /**
     * Delete a entity in repository by id
     * @param mixed $id
     * @return int
     * @throws Exception
     */
    public function delete(mixed $id): int
    {
        $model = $this->find($id);
        $this->resetModel();

        return $model->delete();
    }

    /**
     * Find data by field and value
     * @param mixed $field
     * @param mixed|null $value
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function findByField(mixed $field, mixed $value = null, array $columns = ['*']): mixed
    {
        $model = $this->model->where($field, '=', $value)->get($columns);
        $this->resetModel();

        return $model;
    }

    /**
     * Find data by multiple fields
     * @param array $where
     * @param array $columns
     * @return mixed
     * @throws Exception
     */
    public function findWhere(array $where, array $columns = ['*']): mixed
    {
        $model = $this->model->get($columns);
        $this->resetModel();

        return $model;
    }


    /**
     * Load relations
     * @param array|string $relations
     * @return $this
     */
    public function with(array|string $relations): static
    {
        $this->model = $this->model->with($relations);

        return $this;
    }
}