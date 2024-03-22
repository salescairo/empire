<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSale extends Model
{
    use HasFactory;

    public const SALE_ID_FIELD = 'sale_id';
    public const PRODUCT_ID_FIELD = 'product_id';

    protected $fillable = [
        'quantity',
        'value',
        'sale_id',
        'product_id',
    ];

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
