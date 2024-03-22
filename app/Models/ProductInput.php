<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductInput extends Model
{
    use HasFactory;

    public const PRODUCT_ID_FIELD = 'product_id';
    public const USER_ID_FIELD = 'user_id';

    protected $fillable = [
        'product_id',
        'user_id',
        'value',
        'quantity',
    ];

    protected $casts = [
        'value' => 'double',
        'quantity' => 'int',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
