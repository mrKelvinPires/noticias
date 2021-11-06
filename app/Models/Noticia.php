<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    const STATUS_ATIVO = "A";

    use HasFactory;
    protected $table = 'noticias';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = ['data_publicacao', 'created_at', 'updated_at'];

    public function getStatusFormatadoAttribute()
    {
        if ($this->status == "A") {
            return "Ativo";
        } 
            return "Inativo";
        }

        public function setDataPublicacaoAttribute($valor)
        {
            $this->attributes['data_publicacao'] = \Carbon\Carbon::createFromFormat("d/m/Y", $valor)->format("Y-m-d");
        }

        public function comentarios()
        {
            return $this->hasMany(Comentario::class);
        }

        public function categorias()
        {
            return $this->belongsToMany(Categoria::class, 'noticias_categorias');
        }
}