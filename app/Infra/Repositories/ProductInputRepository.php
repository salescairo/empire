<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\ProductInputInterface;
use App\Models\ProductInput;
use Illuminate\Database\Eloquent\Builder;

class ProductInputRepository extends ResourceRepository implements ProductInputInterface
{
    public mixed $model = ProductInput::class;
    public array $relationships = ['product.brand'];

    public function customFilters(Builder $query, array $data): void
    {
        parent::customFilters($query, $data);

        array_key_exists(key: 'name', array: $data)
            && $query->whereRelation('product', 'name', 'like', '%' . $data[Product::NAME_FIELD] . '%');
    }
}