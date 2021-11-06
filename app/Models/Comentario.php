<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $dates = ['data_publicacao', 'created_at', 'updated_at'];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }

}