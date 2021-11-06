@extends('adminlte::page')

@section('content')

    <div class="container pt-5">
        <h2>Listagem de Notícias</h2>
        <a href="/noticias/create" class="btn btn-primary mb-5">Nova Notícia</a>

        @if(session()->has('mensagem'))
        <div class="alert alert-success">
            {{ session()->get('mensagem') }}
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Data Publicação</th>
                    <th>Imagem</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($noticias as $noticia)
                <tr>
                    <td>
                        <a href="/noticias/{{ $noticia->id }}/edit" class="btn btn-warning">Editar</a>
                        <form action="/noticias/{{ $noticia->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->status_formatado }}</td>
                    <td>{{ $noticia->data_publicacao->format('d/m/Y') }}</td>
                    <td><img src="{{ $noticia->imagem}}" height="40px"></td>
                </tr>

                @endforeach
            </tbody>
        </table>
        {{ $noticias->links() }}
    </div>
@stop   