@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Detalhe do Jogador <strong>{{ $detalhes_jogadore->jogador->nome }}</strong>
                        <a href="{{ route('detalhes_jogadores.index') }}" class="float-right"
                            style="margin-right:0.8rem"><img src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div style="margin: 0 auto; margin-top:2rem;">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($detalhes_jogadore->jogador->id_escalao == 8)
                                        <img src="/storage/jogadores/juniores/{{ $detalhes_jogadore->jogador->foto }}"
                                            class="img-fluid rounded-start" alt="...">
                                    @elseif ($detalhes_jogadore->jogador->id_escalao == 7)
                                        <img src="/storage/jogadores/juniores/{{ $detalhes_jogadore->jogador->foto }}"
                                            class="img-fluid rounded-start" alt="...">
                                    @endif

                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $detalhes_jogadore->id }} -
                                            {{ $detalhes_jogadore->jogador->nome }}</h5>
                                        <p class="card-text">Nome Completo: {{ $detalhes_jogadore->nome_completo }}</p>
                                        <p class="card-text">Informação: {{ $detalhes_jogadore->info }}</p>
                                        <p class="card-text"> Nasceu em : {{ $detalhes_jogadore->data_nascimento }} </p>
                                        <p class="card-text">Naturalidade: {{ $detalhes_jogadore->Naturalidade }}</p>
                                        <p class="card-text">Link: <a href="{{ $detalhes_jogadore->link }}" target="_blank">{{ $detalhes_jogadore->link }}</a></p>
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
                                    <td>{{ $detalhes_jogadore->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nome Completo:</td>
                                    <td>{{ $detalhes_jogadore->nome_completo }}</td>
                                </tr>
                                <tr>
                                    <td>Ano de Nascimento:</td>
                                    <td>{{ $detalhes_jogadore->data_nascimento }}</td>
                                </tr>
                                <tr>
                                    <td>Naturalidade:</td>
                                    <td>{{ $detalhes_jogadore->Naturalidade }}</td>
                                </tr>
                                <tr>
                                    <td>Informação:</td>
                                    <td>{{ $detalhes_jogadore->info }}</td>
                                </tr>
                                <tr>
                                    <td>Link:</td>
                                    <td><a href="{{ $detalhes_jogadore->link }}" target="_blank">{{ $detalhes_jogadore->link }}</a></td>
                                </tr>
                                <tr>
                                    <td>Jogador:</td>
                                    <td>{{ $detalhes_jogadore->jogador->nome }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
