<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;
    protected $table = "sub_categorias";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nombre_sub_categoria',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
