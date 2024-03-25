<?php

declare(strict_types=1);

namespace App\Services;

use App\Infra\Contracts\ServiceInterface;
use App\Infra\Contracts\ServiceSaleInterface;
use App\Infra\Contracts\SaleInterface;
use App\Models\ServiceSale;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceSaleService
{
    public function __construct(
        private readonly ServiceSaleInterface $repository,
        private readonly SaleInterface $sale_repository,
        private readonly ServiceInterface $service_repository
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
        $data[ServiceSale::SALE_ID_FIELD] = $this->sale_repository->findById((int) $data[ServiceSale::SALE_ID_FIELD])?->id;
        $data[ServiceSale::SERVICE_ID_FIELD] = $this->service_repository->findById((int) $data[ServiceSale::SERVICE_ID_FIELD])?->id;
        return $this->repository->save($data);
    }

    public function update(int $id, array $data): ?object
    {
        array_key_exists(key: ServiceSale::SALE_ID_FIELD,array: $data)
            && $this->sale_repository->findById((int) $data[ServiceSale::SALE_ID_FIELD])?->id;

        array_key_exists(key: ServiceSale::SERVICE_ID_FIELD,array: $data)
            && $this->service_repository->findById((int) $data[ServiceSale::SERVICE_ID_FIELD])?->id;

        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}