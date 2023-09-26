<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;
    protected $table = "tallas";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nombre_talla',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
