<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductInputService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductInputController
{
    public function __construct(
        public ProductInputService $service,
        public ProductService $product_service
    ) {
    }

    public function index(Request $request): Response
    {
        return response()->view('model.product_input.index', [
            'models' => $this->service->findPaginate($request->all())]
        );
    }

    public function create(): Response
    {
        return response()->view('model.product_input.create', [
            'products' => $this->product_service->findAll([])
        ]);
    }

    public function edit(int $id): RedirectResponse|Response
    {
        $model = $this->service->findById($id);
        if (is_null($model)) {
            return back();
        }
        return response()->view('model.product_input.edit', [
            'model' => $model,
            'products' => $this->product_service->findAll([])
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $this->service->save($request->all());
        return back();
    }

    public function update(Request $request, int $id): RedirectResponse|Response
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