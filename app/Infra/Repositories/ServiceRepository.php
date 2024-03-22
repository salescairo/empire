<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\ServiceInterface;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;

class ServiceRepository extends ResourceRepository implements ServiceInterface
{
    public mixed $model = Service::class;
    public array $relationships = [];

    public function customFilters(Builder $query, array $data): void
    {
        parent::customFilters($query, $data);

        array_key_exists(key: 'name', array: $data)
            && $query->where('name', 'like', '%' . $data[Service::NAME_FIELD] . '%');
    }
}