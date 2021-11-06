<?php

namespace App\Services;

class UploadService 
{
    public static function upload($request)
    {
        $nomeImagem = date('YmdHis') . mt_rand(0, 9999) . ".jpg";
        $pathImagem = $request->imagem->storeAs('public', $nomeImagem);

        return '/storage/' . $nomeImagem;
    }
}