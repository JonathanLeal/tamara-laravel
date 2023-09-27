<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagenes extends Model
{
    use HasFactory;
    protected $table = "producto_imagenes";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'imagen',
        'producto_id'
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
