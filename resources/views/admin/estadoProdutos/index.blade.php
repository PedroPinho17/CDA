@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Estados do Produtos
            @if ($verification == null)
                <a href="{{ route('estadoProdutos.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Estado"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('estadoProdutos.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Estado"> </a>
            @endif

        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr style="text-align:center;">
                            <th scope="col">#</th>
                            <th scope="col">Estado:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="text-align:center;">
                            <th scope="col">#</th>
                            <th scope="col">Estado:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($estadoProdutos as $estadoProduto)
                            <tr style="text-align:center;">
                                <th scope="row">{{ $estadoProduto->id_estado  }}</th>
                                <td>{{ $estadoProduto->Estado}}</td>
                                <td><a href="{{ route('estadoProdutos.show', ['estadoProduto' => $estadoProduto->id_estado ]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('estadoProdutos.edit', ['estadoProduto' => $estadoProduto->id_estado ]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $estadoProduto->id_estado  }}"
                                        action="{{ route('estadoProdutos.destroy', ['estadoProduto' => $estadoProduto->id_estado ]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $estadoProduto->id_estado  }}').submit()"><img
                                                src="{{ asset('img/clube/eliminar.png') }}" alt="Eliminar"></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $estadoProdutos->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $estadoProdutos->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $estadoProdutos->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $estadoProdutos->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
