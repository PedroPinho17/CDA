@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Jogo
                        <a href="{{ route('jogos.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $jogo->id_jogo }}</td>
                                </tr>
                                <tr>
                                    <td>Equipa adversária:</td>
                                    <td>{{ $jogo->equipa_visitante }}</td>
                                </tr>
                                <tr>
                                    <td>Resultado:</td>
                                    <td>{{ $jogo->resultado }}</td>
                                </tr>
                                <tr>
                                    <td>Data:</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($jogo->data)) }}</td>
                                </tr>
                                <tr>
                                    <td>Link:</td>
                                    <td>{{ $jogo->link }}</td>
                                <tr>
                                    <td>Escalão:</td>
                                    <td>{{ $jogo->equipa->nome }}</td>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
