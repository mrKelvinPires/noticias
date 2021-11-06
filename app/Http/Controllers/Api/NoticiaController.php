<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\NoticiaController;
use App\Models\Noticia;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        return Noticia::all();
    }

    public function store(Request $request)
    {
        return Noticia::create($request->all());
        $dados = $request->all();
        $dados['imagem'] = UploadService::upload($request);
    
        $noticia->update($dados);
        
        return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
    }

    public function update(Request $request, Noticia $noticia) 
    {
        $noticia->update($request->all());
        return $noticia;
    }

    public function destroy(Noticia $noticia)
    {
        return $noticia->delete();
    }

    public function show(Noticia $noticia)
    {
        return $noticia;
    }
}
