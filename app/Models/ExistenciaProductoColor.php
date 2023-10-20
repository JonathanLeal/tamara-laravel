<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistenciaProductoColor extends Model
{
    use HasFactory;
    protected $table = "existencias_disponibles_producto";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'producto_id',
        'existencia',
        'color_id',
        'talla_id',
        'created_at',
        'updated_at'
    ];
}
