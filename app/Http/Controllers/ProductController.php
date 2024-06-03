<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use Illuminate\Http\Request;
use App\Services\Contracts\ProductServiceInterface;

class ProductController extends Controller
{
    public function __construct(private ProductServiceInterface $productService)
    {
    }

    public function index(): mixed
    {
        $record = $this->productService->getList();

        return $this->paginateDataResponse($record);
    }

    public function create(CreateProductRequest $request): mixed
    {
        $record = $this->productService->create($request);

        return $this->successResponse($record);
    }

    public function show(int $id): mixed
    {
        $record = $this->productService->show($id);

        return $this->successResponse($record);
    }

    public function edit(Request $request): mixed
    {
        $record = $this->productService->edit($request);

        return $this->successResponse($record);
    }

    public function delete(int $id): mixed
    {
        $record = $this->productService->delete($id);

        return $this->successResponse($record);
    }
}