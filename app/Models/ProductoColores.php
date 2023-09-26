<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoColores extends Model
{
    use HasFactory;
    protected $table = "producto_colores";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'producto_id',
        'colores_id',
        'user_id'
    ];

    public function colores()
    {
        return $this->belongsTo(Color::class, 'colores_id');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
