<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\SaleInterface;
use App\Models\Sale;

class SaleRepository extends ResourceRepository implements SaleInterface
{
    public mixed $model = Sale::class;
    public array $relationships = ['customer', 'user'];
}