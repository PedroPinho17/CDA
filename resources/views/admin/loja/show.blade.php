@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Produto
                        <a href="{{ route('loja.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div style="margin: 0 auto; margin-top:2rem;">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($loja->id_produto == 14)
                                        <img style="width:10.5rem; height:15.5rem; margin: 0 auto;"
                                            src="/storage/foto_produto/{{ $loja->foto_produto }}"
                                            class="img-fluid rounded-start" alt="...">
                                    @else
                                        <img src="/storage/foto_produto/{{ $loja->foto_produto }}"
                                            class="img-fluid rounded-start" alt="...">
                                    @endif

                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $loja->id_produto }} - {{ $loja->nome_produto }}</h5>
                                        <p class="card-text">{{ $loja->valor }} €</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>Tabela</p>
                        </blockquote>
                    </figure>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $loja->id_produto }}</td>
                                </tr>

                                <tr>
                                    <td>Nome:</td>
                                    <td>{{ $loja->nome_produto }}</td>
                                </tr>

                                <tr>
                                    <td>Valor(€):</td>
                                    <td>{{ $loja->valor }} €</td>
                                </tr>

                                <tr>
                                    <td>Estado:</td>
                                    <td>{{ $loja->estado_produto_id }} - {{ $loja->estadoProduto->Estado }} </td>
                                </tr>

                                <tr>
                                    <td>Foto Produto:</td>
                                    <td>
                                        <img style="width:10rem; height:10rem;"
                                            src="/storage/foto_produto/{{ $loja->foto_produto }}"
                                            alt="{{ $loja->foto_produto }}">
                                        <br>
                                        {{ $loja->foto_produto }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
