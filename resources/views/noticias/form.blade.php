@extends('adminlte::page')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Notícias</title>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container pt-5">
        <h4>Edição de Notícias</h4>

        <div class="container pt-5">

            @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Erro ao realizar esta operação</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (isset($noticia))
            <form action="/noticias/{{ $noticia->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @else
                <form action="/noticias/" method="POST" enctype="multipart/form-data">
                    @endif


                    @csrf
                    <div>
                        <label for="titulo" name="titulo">Título</label>
                        <input type="text" name="titulo" class="form-control"
                            value="{{ isset($noticia) ?  $noticia->titulo : ''}}">
                    </div>

                    <div>
                        <label for="conteudo" name="conteudo">Conteúdo</label>
                        <textarea name="conteudo" rows="5"
                            class="form-control">{{ isset($noticia) ? $noticia->conteudo : '' }}</textarea>
                    </div>

                    <div>
                        <label for="imagem" name="imagem">Imagem</label><br />
                        <input type="file" name="imagem">
                        <div>
                            <img src="{{ $noticia->imagem }}" alt="" height="100px">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="A"
                                {{ isset($noticia) && $noticia->status == "A" ? 'selected="selected"' : '' }}>Ativo
                            </option>
                            <option value="I"
                                {{ isset($noticia) && $noticia->status == "I" ? 'selected="selected"' : '' }}>Inativo
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="data_publicacao">Data</label>
                        <input type="text" name="data_publicacao" class="form-control" data-provide="datepicker"
                            data-date-format="dd/mm/yyyy" data-date-language="pt-BR" value="{{ isset($noticia) ? $noticia->data_publicacao->format("d/m/Y") : '' }}">
                    </div>

                    <button class="btn btn-primary">Salvar</button>
                    <a href="/noticias" class="btn btn-defalt">Voltar</a>

                    @if (isset($noticia))
                    <h4>Comentários:</h4>
                    @foreach ($noticia->comentarios as $comentario)
                    <div>
                        {{ $comentario->conteudo }}
                        <p class="text-muted">Criado em: {{ $comentario->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    @endforeach

                    <h4>Categoria:</h4>

                    @foreach ($noticia->categorias as $categoria)
                    <div>
                        {{ $categoria->nome }}
                    </div>
                    @endforeach
                    @endif
                </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
            integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"
            integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

@stop