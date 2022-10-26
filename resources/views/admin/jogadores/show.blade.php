@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Jogador
                        <a href="{{ route('jogadores.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>ID:</td>
                                <td>{{ $jogadore->id_jogador }}</td>
                            </tr>

                            <tr>
                                <td>Nome:</td>
                                <td>{{ $jogadore->nome }}</td>
                            </tr>
                            <tr>
                                <td>Peso:</td>
                                <td>{{ $jogadore->peso }}</td>
                            </tr>
                            <tr>
                                <td>Altura:</td>
                                <td>{{ $jogadore->altura }}</td>
                            </tr>
                            <tr>
                                <td>Número Camisola:</td>
                                <td>{{ $jogadore->numero_camisola }}</td>
                            <tr>
                            <tr>
                                <td>Posição:</td>
                                <td>{{ $jogadore->posicao }}</td>
                            </tr>
                            <tr>
                                <td>Foto:</td>
                                <td>
                                    @if ($jogadore->id_escalao == 8)
                                        <img style="width:7.5rem; height=7.5rem;"
                                            src="/storage/jogadores/seniores/{{ $jogadore->foto }}"
                                            alt="{{ $jogadore->foto }}">
                                        <br>
                                        {{ $jogadore->foto }}
                                    @elseif ($jogadore->id_escalao == 7)
                                        <img style="width:7.5rem; height=7.5rem;"
                                            src="/storage/jogadores/juniores/{{ $jogadore->foto }}"
                                            alt="{{ $jogadore->foto }}">
                                        <br>
                                        {{ $jogadore->foto }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Escalão:</td>
                                <td>{{ $jogadore->id_escalao }} - {{ $jogadore->escalao->nome_escalao }}</td>
                            </tr>
                            <tr>
                                <td>Equipa:</td>
                                <td>{{ $jogadore->id_equipa }} - {{ $jogadore->equipa->nome }} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
