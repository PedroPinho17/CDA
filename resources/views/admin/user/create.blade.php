@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background-image: url(/img/clube/logo_arrifana.png); background-repeat: no-repeat; background-size:24rem;">
                                <!--<img  src="{{ asset('img/clube/home.png') }}" class="w-100" alt="Arrifana">-->
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Crie uma nova Conta!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('user.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input id="name" type="text"
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                placeholder="Nome" name="name" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter endereço de email..." name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password" required
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Confirme a Password"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Escolha o Tipo de Utilizador</label>
                                            <select class="form-select" aria-label="Default select example" name="tipoUser_id">
                                                <option selected>Utilizador:</option>
                                                @foreach ($tipoUsers as $key => $tp)
                                                    <option value="{{ $tp->idTpUser }}"> {{ $tp->idTpUser }} - {{ $tp->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Registar') }}
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
