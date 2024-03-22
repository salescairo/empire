<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\ProductInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository extends ResourceRepository implements ProductInterface
{
    public mixed $model = Product::class;
    public array $relationships = ['brand'];

    public function customFilters(Builder $query, array $data): void
    {
        parent::customFilters($query, $data);

        array_key_exists(key: 'name', array: $data)
            && $query->where('name', 'like', '%' . $data[Product::NAME_FIELD] . '%');
    }
}