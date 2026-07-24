<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Le indicamos a Laravel el nombre exacto de la tabla en tu BD
    protected $table = 'comandas'; 

    protected $fillable = [
        'mesa',
        'usuario',
        'preparacion',
        'total',
        'is_offline_synced',
    ];

    protected $casts = [
        'is_offline_synced' => 'boolean',
    ];
}