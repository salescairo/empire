<?php

declare(strict_types=1);

namespace App\Infra\Repositories;

use App\Infra\Contracts\ServiceSaleInterface;
use App\Models\ServiceSale;

class ServiceSaleRepository extends ResourceRepository implements ServiceSaleInterface
{
    public mixed $model = ServiceSale::class;
    public array $relationships = ['service', 'sale'];
}