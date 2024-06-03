<?php

namespace App\Repository;

use App\Models\Product;
use App\Repository\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }
}