<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    public const CUSTOMER_ID_FIELD = 'customer_id';
    public const USER_ID_FIELD = 'user_id';
    const CREDIT_MODE = 'CREDITO';
    const DEBIT_MODE = 'DÉBITO';
    const BOLETO_MODE = 'BOLETO';
    const BANK_TRANSFER_MODE = 'TRANSFERÊNCIA BANCÁRIA/PIX';

    protected $fillable = [
        'payment_mode',
        'installments',
        'customer_id',
        'user_id',
    ];

    public static function getModeList(): array
    {
        return [
            self::CREDIT_MODE,
            self::DEBIT_MODE,
            self::BOLETO_MODE,
            self::BANK_TRANSFER_MODE,
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
