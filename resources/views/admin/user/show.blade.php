@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Utilizador
                        <a href="{{ route('user.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>
                                        <p class="mb-4">{{ $user->id }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nome:</td>
                                    <td>
                                        <p class="mb-4">{{ $user->name }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Password:</td>
                                    <td>
                                        <p class="mb-4">{{ $user->password }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rede:</td>
                                    <td>
                                        @if ($user->rede == null)
                                            <p class="mb-4">Ainda não inseriu a sua rede social</p>
                                        @else
                                            <p class="mb-4"><a href="{{ $user->rede }}" target="_blank">{{ $user->rede }}</a></p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tipo de Utilizador:</td>
                                    <td>
                                            <p class="mb-4">{{ $user->tp->nome }}</p>
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
