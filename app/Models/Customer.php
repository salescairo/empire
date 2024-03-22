<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public const NAME_FIELD = 'name';
    public const DOCUMENT_FIELD = 'document';

    protected $fillable = [
        'name',
        'document',
        'email',
        'phone',
    ];
}
