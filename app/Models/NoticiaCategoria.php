<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiaCategoria extends Model
{
    use HasFactory;
    protected $table = 'noticias_categorias';
    // public function categorias()
    // {
    //     return $this->belongsToMany(Categoria::class, 'noticias_categorias');
    // }
}
