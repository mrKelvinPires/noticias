<?php

namespace App\Http\Controllers;

use App\Services\UploadService;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;


class NoticiasController extends Controller
{
public function index()
{
    $noticias = Noticia::where('status', Noticia::STATUS_ATIVO)->paginate(6);

    return view('noticias.index', [
        'noticias' => $noticias
    ]);
}

public function create()
{
    return view('noticias.form');
}
public function store(NoticiaRequest $request)
{

$dados = $request->all();

$dados['imagem'] = UploadService::upload($request);

$noticia = Noticia::create($dados);

return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit(Noticia $noticia)
{
    return view('noticias.form', [
        'noticias' => $noticia
    ]);
}

public function update(Noticia $noticia, NoticiaRequest $request)
{
    $dados = $request->all();
    $dados['imagem'] = UploadService::upload($request);

    $noticia->update($dados);
    
    return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
}

public function destroy(Noticia $noticia)
{
    // $noticia = Noticia::find($noticia);
    $noticia->delete();
    $noticia->delete();

    return redirect('/noticias')->with('mensagem', 'Registro excluído com sucesso!');
}
}