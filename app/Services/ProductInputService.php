<?php

declare(strict_types=1);

namespace App\Services;

use App\Infra\Contracts\ProductInputInterface;
use App\Infra\Contracts\ProductInterface;
use App\Models\ProductInput;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductInputService
{
    public function __construct(
        private readonly ProductInputInterface $repository,
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
        $data[ProductInput::PRODUCT_ID_FIELD] = $this->product_repository->findById((int) $data[ProductInput::PRODUCT_ID_FIELD])?->id;
        $data[ProductInput::USER_ID_FIELD] = auth()->user()->id;
        return $this->repository->save($data);
    }

    public function update(int $id, array $data): ?object
    {
        array_key_exists(key: ProductInput::PRODUCT_ID_FIELD,array: $data)
            && $this->product_repository->findById((int) $data[ProductInput::PRODUCT_ID_FIELD])?->id;
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}