<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitacora extends Model
{
    use HasFactory;
    protected $table = "vitacora";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'accion',
        'producto_id',
        'cantidad_afectada',
        'ubicacion_id',
        'user_id',
        'rol_id',
        'oferta_id',
        'pago_id',
        'facturacion_id',
        'fecha_accion',
        'created_at',
        'updated_at'
    ];
}
