<?php

declare(strict_types=1);

namespace App\Services;

use App\Infra\Contracts\BrandInterface;
use App\Infra\Contracts\ProductInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(
        private readonly ProductInterface $repository,
        private readonly BrandInterface $brand_repository
    ) {
    }

    public function findPaginate(array $data): LengthAwarePaginator
    {
        return $this->repository->findPaginate($data);
    }

    public function findAll(array $data): Collection
    {
        return $this->repository->findAll($data)->map(function (Product $product) {
            $product->content = $product->name . ' - ' . $product->brand->name;
            return $product;
        });
    }

    public function findById(int $id): ?object
    {
        return $this->repository->findById($id);
    }

    public function save(array $data): ?object
    {
        $data[Product::BRAND_ID] = $this->brand_repository->findById($data[Product::BRAND_ID]);
        return $this->repository->save($data);
    }

    public function update(int $id, array $data): ?object
    {
        $data[Product::BRAND_ID] = $this->brand_repository->findById($data[Product::BRAND_ID]);
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}