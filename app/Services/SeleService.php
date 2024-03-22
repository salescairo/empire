<?php

declare(strict_types=1);

namespace App\Services;

use App\Infra\Contracts\CustomerInterface;
use App\Infra\Contracts\SaleInterface;
use App\Infra\Contracts\UserInterface;
use App\Models\Sale;
use Illuminate\Pagination\LengthAwarePaginator;

class SeleService
{
    public function __construct(
        private readonly SaleInterface $repository,
        private readonly CustomerInterface $customer_repository,
        private readonly UserInterface $user_repository
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
        $data[Sale::USER_ID_FIELD] = $this->user_repository->findById((int) $data[Sale::USER_ID_FIELD])?->id;
        $data[Sale::CUSTOMER_ID_FIELD] = $this->customer_repository->findById((int) $data[Sale::CUSTOMER_ID_FIELD])?->id;
        return $this->repository->save($data);
    }

    public function update(int $id, array $data): ?object
    {
        array_key_exists(key: Sale::USER_ID_FIELD,array: $data)
            && $this->user_repository->findById((int) $data[Sale::USER_ID_FIELD])?->id;

        array_key_exists(key: Sale::CUSTOMER_ID_FIELD,array: $data)
            && $this->customer_repository->findById((int) $data[Sale::CUSTOMER_ID_FIELD])?->id;

        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}