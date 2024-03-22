<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\ProductSaleInterface;
use App\Models\ProductSale;

class ProductSaleRepository extends ResourceRepository implements ProductSaleInterface
{
    public mixed $model = ProductSale::class;
    public array $relationships = ['product', 'sale'];
}