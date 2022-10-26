@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Link
                        <a href="{{ route('afa.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $afa->id }}</td>
                                </tr>
                                <tr>
                                    <td>Link:</td>
                                    <td>{{ $afa->link }}</td>
                                </tr>
                                <tr>
                                    <td>Equipa:</td>
                                    <td>{{ $afa->equipa_id }} - {{ $afa->equipa->nome }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
