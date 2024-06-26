<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;

class ProductController
{
    public function __construct(
        public ProductService $service,
        public BrandService $brand_service
    ) {
    }

    public function index(Request $request): Response
    {
        return response()->view('model.product.index', [
            'models' => $this->service->findPaginate($request->all())]
        );
    }

    public function create(): Response
    {
        return response()->view('model.product.create', [
            'brands' => $this->brand_service->findEnabledAll()
        ]);
    }

    public function edit(int $id): RedirectResponse|Response
    {
        $model = $this->service->findById($id);
        if (is_null($model)) {
            return back();
        }
        return response()->view('model.product.edit', [
            'model' => $model
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $this->service->save($request->all());
        return back();
    }

    public function update(ProductRequest $request, int $id): RedirectResponse|Response
    {
        $model = $this->service->findById($id);
        if (is_null($model)) {
            return back();
        }
        $this->service->update($id, $request->all());
        return back();
    }

    public function destroy(int $id): RedirectResponse|Response
    {
        $model = $this->service->findById($id);
        if (is_null($model)) {
            return back();
        }
        $this->service->delete($id);
        return back();
    }
}