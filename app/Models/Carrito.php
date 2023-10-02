<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = "carrito";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'producto_id',
        'talla_id',
        'color_id',
        'cantidad',
        'total',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
