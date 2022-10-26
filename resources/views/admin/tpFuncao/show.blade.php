@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Visualizar treinador
            <a href="{{ route('tpFuncao-equipaTec.index') }}" class="float-right" style="margin-right:0.8rem"><img
                    src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>ID:</td>
                    <td>{{ $tpFuncao_equipaTec->id }}</td>
                </tr>

                <tr>
                    <td>Nome:</td>
                    <td>{{ $tpFuncao_equipaTec->nome_treinador }}</td>
                </tr>
                <tr>
                    <td>Função:</td>
                    <td>{{ $tpFuncao_equipaTec->funcao }}</td>
                </tr>
                <tr>
                    <td>Foto:</td>
                    <td>
                        @if ($tpFuncao_equipaTec->id_equipaTec == 1)
                            <img style="width:7.5rem; height:7.5rem;"
                                src="/storage/treinadores/seniores/{{ $tpFuncao_equipaTec->foto_treinador }}"
                                alt="{{ $tpFuncao_equipaTec->foto_treinador }}">
                            <br>
                            {{ $tpFuncao_equipaTec->foto_treinador }}
                        @elseif ($tpFuncao_equipaTec->id_equipaTec == 2)
                            <img style="width:7.5rem; height:7.5rem;"
                                src="/storage/treinadores/juniores/{{ $tpFuncao_equipaTec->foto_treinador }}"
                                alt="{{ $tpFuncao_equipaTec->foto_treinador }}">
                            <br>
                            {{ $tpFuncao_equipaTec->foto_treinador }}
                        @elseif ($tpFuncao_equipaTec->id_equipaTec == 3)
                            <img style="width:7.5rem; height:7.5rem;"
                                src="/storage/treinadores/juvenis/{{ $tpFuncao_equipaTec->foto_treinador }}"
                                alt="{{ $tpFuncao_equipaTec->foto_treinador }}">
                            <br>
                            {{ $tpFuncao_equipaTec->foto_treinador }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Equipa Técnica:</td>
                    <td>{{ $tpFuncao_equipaTec->id_equipaTec }} - {{ $tpFuncao_equipaTec->equipaTecnica->nome }} </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
