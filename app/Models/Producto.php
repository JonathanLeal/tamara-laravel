<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "productos";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre_producto',
        'existencia',
        'precio_1',
        'precio_2',
        'precio_3',
        'precio_4',
        'estilo',
        'detalles',
        'escote',
        'longitud_manga',
        'tejido',
        'composicion',
        'instrucciones_cuidado',
        'sku',
        'categoria_id',
        'sub_categoria_id',
        'user_id',
        'imagen',
        'created_at',
        'updated_at'
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function productos()
    {
        return $this->belongsTo(SubCategoria::class, 'sub_categoria_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
