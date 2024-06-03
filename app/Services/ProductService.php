<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\Contracts\ProductRepositoryInterface;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductService implements ProductServiceInterface
{
    public function __construct(private ProductRepositoryInterface $product)
    {
    }

    public function getList(): mixed
    {
        return $this->product->paginate(15);
    }

    public function create(Request $request): mixed
    {
        return $this->product->create([
            'name' => $request->name,
            'price' => $request->price,
            'code' => $request->code,
        ]);
    }

    public function show(int $id): mixed
    {
        return $this->product->find($id);
    }

    public function edit(Request $request): mixed
    {
        return $this->product->update($request->id, $request->all());
    }

    public function delete(int $id): mixed
    {
        return $this->product->delete($id);
    }
}