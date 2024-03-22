<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\CustomerInterface;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

class CustomerRepository extends ResourceRepository implements CustomerInterface
{
    public mixed $model = Customer::class;
    public array $relationships = [];

    public function customFilters(Builder $query, array $data): void
    {
        parent::customFilters($query, $data);

        array_key_exists(key: 'name', array: $data)
            && $query->where('name', 'like', '%' . $data[Customer::NAME_FIELD] . '%');
    }
}