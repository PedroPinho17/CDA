@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Equipa Técnica
                        <a href="{{ route('equipaTec.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $equipaTec->id_equipaTec }}</td>
                                </tr>

                                <tr>
                                    <td>Nome:</td>
                                    <td>{{ $equipaTec->nome }}</td>
                                </tr>
                                <tr>
                                    <td>Foto:</td>
                                    <td>
                                        <img style="width:10rem; height:10rem;"
                                            src="/storage/fotos_equipa_tecnica/{{ $equipaTec->foto }}"
                                            alt="{{ $equipaTec->foto }}">
                                        <br>
                                        {{ $equipaTec->foto }}
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
