<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTallas extends Model
{
    use HasFactory;
    protected $table = "producto_colores";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'producto_id',
        'tallas_id',
        'user_id'
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function tallas()
    {
        return $this->belongsTo(Talla::class, 'tallas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
