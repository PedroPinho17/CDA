@extends('layouts.master')
<style>
    /* List with bullets */
    .list-bullets {
        list-style: none;
    }

    .list-bullets li {
        display: flex;
        align-items: center;
    }

    .list-bullets li::before {
        content: '';
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #5784d7;
        border: 2px solid #8fb3f5;
        display: block;
        margin-right: 1rem;
    }

    /* Unordered list with custom numbers style */
    ol.custom-numbers {
        list-style: none;
    }

    ol.custom-numbers li {
        counter-increment: my-awesome-counter;
    }

    ol.custom-numbers li::before {
        content: counter(my-awesome-counter) ". ";
        color: #2b90d9;
        font-weight: bold;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Editar Profile</h5>
                </div>
                <form method="post" action="{{ route('user.profile.edit', ['user' => auth()->user()->id]) }}"
                    autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                            <label>{{ __('Nome') }}</label>
                            <input type="text" name="id"
                                class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('id') }}" value="{{ old('id', auth()->user()->id) }}" readonly>

                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nome') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Endereço de Email ') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Email address') }}"
                                value="{{ old('email', auth()->user()->email) }}">

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

            <div class="card" style="margin-top:.7rem;">
                <div class="card-header">
                    <h5 class="title">{{ __('Password') }}</h5>
                </div>
                <form method="post" action="{{ route('user.profile.editPassword', ['user' => auth()->user()->id]) }}"
                    autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label>{{ __('Password Atual') }}</label>
                            <input type="password" name="old_password"
                                class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Current Password') }}" value="" required>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('Nova Password') }}</label>
                            <input type="password" name="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('New Password') }}" value="" required>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm a Nova Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="{{ __('Confirm New Password') }}" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Alterar password') }}</button>
                    </div>
                </form>
            </div>

            <div class="card" style="margin-top:.7rem;">
                <div class="card-header">
                    <h5 class="title">{{ __('Detalhes') }}</h5>
                </div>
                <form method="post" action="{{ route('user.profile.editDetalhes', ['user' => auth()->user()->id]) }}"
                    autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
                            <label>{{ __('Cargo') }}</label>
                            <input type="text" name="cargo"
                                class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Cargo') }}" value="{{ $tpUser[0]->nome }}" readonly>
                        </div>
                        <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                            <label>{{ __('Descrição') }}</label>
                            <input type="text" name="cargo"
                                class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Descrição') }}" value="{{ $tpUser[0]->descricao }}" readonly>
                        </div>
                        <div class="form-group{{ $errors->has('telemovel') ? ' has-danger' : '' }}">
                            <label>{{ __('Telemovel') }}</label>
                            <input type="text" name="telemovel"
                                class="form-control{{ $errors->has('telemovel') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Telemovel') }}"
                                value="{{ old('telemovel', auth()->user()->telemovel) }}" size=9>
                        </div>
                        <div class="form-group{{ $errors->has('rede') ? ' has-danger' : '' }}">
                            <label>{{ __('Rede') }}</label>
                            <input type="text" name="rede"
                                class="form-control{{ $errors->has('rede') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Rede') }}" value="{{ old('rede', auth()->user()->rede) }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn btn-fill btn-primary">{{ __('Adicionar/Alterar Detalhes') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    <div class="author" style="text-align: center;">
                        <a href="#">
                            <img class="avatar" src="/storage/Perfil/{{ Auth::user()->foto_perfil }}" alt=""
                                style="max-width:10rem; max-height:10rem; border-radius: 100%;">
                            <h5 class="title" style="text-align:center; margin-top:1rem;">{{ auth()->user()->name }}
                            </h5>
                        </a>
                        <p class="description" style="text-align:center;">
                            {{ $tpUser[0]->nome }}
                        </p>
                        <p class="description" style="text-align:center;">
                            {{ $tpUser[0]->descricao }}
                        </p>
                    </div>
                    </p>
                    <div class="card-description" style="text-align:center;">
                        {{ auth()->user()->email }}
                    </div>
                </div>
                <div class="card-footer">
                    <p class="description" style="text-align:center; font-weight:bold;">
                        (+351) {{ auth()->user()->telemovel }}
                    </p>
                    <p class="description" style="text-align:center; font-weight:bold;">
                        <a href="{{ auth()->user()->rede }}" target="_blank">{{ auth()->user()->rede }}</a>
                    </p>

                </div>
            </div>



            <!-- Approach -->
            <div class="card shadow mb-4" style="margin-top:.7rem;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold " style="color:#F51100">Deseja eliminar sua conta?</h6>
                </div>
                <div class="card-body" align=center>
                    <p>Para eliminar sua conta basta clicar no botão abaixo.</p>
                    <form id="form_{{ auth()->user()->id  }}"
                        action="{{ route('user.destroy', ['user' => auth()->user()->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="document.getElementById('form_{{ auth()->user()->id }}').submit()" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Eliminar Conta</span>
                        </a>
                    </form>


                </div>
            </div>



            <div class="card card-user" style="margin-top:.7rem;">
                <form method="post" action="{{ route('user.profile.editFoto', ['user' => auth()->user()->id]) }}"
                    autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Coloque a sua foto de perfil</label>
                            <input type="file" class="opacity-0" name="foto_perfil" />
                        </div>
                        <div class="card-footer" style="text-align:center;">
                            <button type="submit"
                                class="btn btn-fill btn-primary">{{ __('Adicionar/Alterar Imagem') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card shadow mb-4" style="margin-top:.7rem;">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tarefas <i class="fa-solid fa-file-lines"
                            style="margin-left: 0.2rem;"></i></h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        @if ($tasks->count() <= 0)
                            <li>Não tem tarefas</li>
                        @else
                            @foreach ($tasks as $task)
                                <li class="mb-2">
                                    <span>{{ $task->texto }}
                                        <a href="{{ route('user.profile.deleteTask', ['task' => $task->id]) }}"
                                            class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-check" style="font-size:12px"></i>
                                        </a>
                                    </span>
                                </li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Clube Desportivo Arrifanense</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 8.3rem;"
                            src="{{ asset('img/clube/logo_arrifana.png') }}" alt="...">
                    </div>
                    <p>Se a história de um clube de Lisboa que nasceu numa farmácia e jogava de águia ao peito já é
                        conhecida, não deixa de ser curioso que o CD Arrifanense partilhe a mesma génese...</p>
                    <a target="_blank" rel="nofollow" href="{{ route('site.historia') }}">Saber Mais &rarr;</a>
                </div>
            </div>

        </div>
    </div>

@endsection
