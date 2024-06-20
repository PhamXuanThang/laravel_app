<?php

namespace App\Traits\Authorizes;

use Illuminate\Http\Request;
use App\Http\Middleware\Authorize;

trait AuthorizesRequests
{
    public function authorizeResources(array|string $model, array|string $parameter = null, array $options = [], Request $request = null): void
    {
        $model = is_array($model) ? implode(',', $model) : $model;
        $middleware = [];
        foreach ($this->resourcesAbilityMap() as $method => $abilities) {
            $abilities = Authorize::buildAbilities($abilities);
            $middleware[Authorize::class . ":{$abilities},{$model}"][] = $method;
        }

        foreach ($middleware as $middlewareName => $methods) {
            $this->middleware($middlewareName, $options)->only($methods);
        }
    }


    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    abstract protected function resourcesAbilityMap(): array;
}