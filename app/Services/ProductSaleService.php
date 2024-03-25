<?php

declare(strict_types=1);

namespace App\Services;

use App\Infra\Contracts\ProductInterface;
use App\Infra\Contracts\ProductSaleInterface;
use App\Infra\Contracts\SaleInterface;
use App\Models\ProductSale;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductSaleService
{
    public function __construct(
        private readonly ProductSaleInterface $repository,
        private readonly SaleInterface $sale_repository,
        private readonly ProductInterface $product_repository
    ) {
    }

    public function findPaginate(array $data): LengthAwarePaginator
    {
        return $this->repository->findPaginate($data);
    }

    public function findById(int $id): ?object
    {
        return $this->repository->findById($id);
    }

    public function save(array $data): ?object
    {
        $data[ProductSale::SALE_ID_FIELD] = $this->sale_repository->findById((int) $data[ProductSale::SALE_ID_FIELD])?->id;
        $data[ProductSale::PRODUCT_ID_FIELD] = $this->product_repository->findById((int) $data[ProductSale::PRODUCT_ID_FIELD])?->id;
        return $this->repository->save($data);
    }

    public function update(int $id, array $data): ?object
    {
        array_key_exists(key: ProductSale::SALE_ID_FIELD,array: $data)
            && $this->sale_repository->findById((int) $data[ProductSale::SALE_ID_FIELD])?->id;

        array_key_exists(key: ProductSale::PRODUCT_ID_FIELD,array: $data)
            && $this->product_repository->findById((int) $data[ProductSale::PRODUCT_ID_FIELD])?->id;

        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}