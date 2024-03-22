<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceSale extends Model
{
    use HasFactory;

    public const SALE_ID_FIELD = 'sale_id';
    public const SERVICE_ID_FIELD = 'service_id';

    protected $fillable = [
        'quantity',
        'value',
        'sale_id',
        'service_id',
    ];

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
