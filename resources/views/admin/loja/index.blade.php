@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Produtos
            @if ($verification == null)
                <a href="{{ route('loja.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Presidente"></a>
                <a href="{{ route('loja.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('loja.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('loja.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Presidente"></a>
                <a href="{{ route('loja.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('loja.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @endif
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($lojas as $loja)
                    <div class="col">
                        <div class="card h-100">
                            @if ($loja->id_produto == 14)
                                <img style="width:10.5rem; height:15.5rem; margin: 0 auto;"
                                    src="/storage/foto_produto/{{ $loja->foto_produto }}" class="card-img-top"
                                    alt="...">
                            @else
                                <img src="/storage/foto_produto/{{ $loja->foto_produto }}" class="card-img-top"
                                    alt="...">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title" style="text-align:center;">{{ $loja->id_produto }} -
                                    {{ $loja->nome_produto }}</h5>
                                <p class="card-text" style="text-align:center;">{{ $loja->valor }} €</p>
                                <p class="card-text" style="text-align:center;">{{ $loja->estado_produto_id }} - {{ $loja->estadoProduto->Estado }} </p>
                            </div>
                            <div class="card-footer" style="display: flex;">
                                <div style=" display: flex; text-align: center; margin: 0 auto;">
                                    <td><a href="{{ route('loja.show', ['loja' => $loja->id_produto]) }}"><img
                                                src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                    <td><a href="{{ route('loja.edit', ['loja' => $loja->id_produto]) }}"><img
                                                src="{{ asset('img/clube/editar.png') }}" alt="Editar"
                                                style="margin-left: 0.8rem; margin-right: 0.8rem;"></a></td>
                                    <td>
                                        <form id="form_{{ $loja->id_produto }}"
                                            action="{{ route('loja.destroy', ['loja' => $loja->id_produto]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="document.getElementById('form_{{ $loja->id_produto }}').submit()"><img
                                                    src="{{ asset('img/clube/eliminar.png') }}" alt="Eliminar"></a>
                                        </form>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Tabela</p>
                </blockquote>
            </figure>
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Produto:</th>
                            <th scope="col">Valor:</th>
                            <th scope="col">Foto Produto:</th>
                            <th scope="col">Estado:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Produto:</th>
                            <th scope="col">Valor:</th>
                            <th scope="col">Foto Produto:</th>
                            <th scope="col">Estado:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($lojas as $loja)
                            <tr>
                                <th scope="row">{{ $loja->id_produto }}</th>
                                <td>{{ $loja->nome_produto }}</td>
                                <td>{{ $loja->valor }} €</td>
                                <td><img style="width:7.5rem; height:7.5rem;"
                                        src="/storage/foto_produto/{{ $loja->foto_produto }}"
                                        alt="{{ $loja->foto_produto }}">
                                    <br>
                                    {{ $loja->foto_produto }}
                                </td>
                                <td>{{ $loja->estado_produto_id }} - {{ $loja->estadoProduto->Estado }}</td>
                                <td><a href="{{ route('loja.show', ['loja' => $loja->id_produto]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('loja.edit', ['loja' => $loja->id_produto]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $loja->id_produto }}"
                                        action="{{ route('loja.destroy', ['loja' => $loja->id_produto]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $loja->id_produto }}').submit()"><img
                                                src="{{ asset('img/clube/eliminar.png') }}" alt="Eliminar"></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $lojas->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $lojas->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $lojas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $lojas->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
