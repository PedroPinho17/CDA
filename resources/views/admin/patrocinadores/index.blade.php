@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Patrocinadores
            @if ($verification == null)
                <a href="{{ route('patrocinadores.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Patrocinador"></a>
                <a href="{{ route('patrocinadores.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('patrocinadores.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('patrocinadores.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Patrocinador"></a>
                <a href="{{ route('patrocinadores.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('patrocinadores.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @endif

        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="text-align:center;" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição:</th>
                            <th scope="col">Link:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição:</th>
                            <th scope="col">Link:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($patrocinadores as $patrocinadore)
                            <tr>
                                <th scope="row">{{ $patrocinadore->id }}</th>
                                <td>{{ $patrocinadore->nome }}</td>
                                <td>{{ $patrocinadore->descricao }}</td>
                                <td><a href="{{ $patrocinadore->link }}" target="_blank">
                                        {{ $patrocinadore->link }}</a>
                                </td>
                                <td>
                                    <img style="width:5rem; height:5rem;"
                                        src="/storage/patrocinadores/{{ $patrocinadore->foto }}"
                                        alt="{{ $patrocinadore->foto }}">
                                </td>
                                <td><a
                                        href="{{ route('patrocinadores.show', ['patrocinadore' => $patrocinadore->id]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a
                                        href="{{ route('patrocinadores.edit', ['patrocinadore' => $patrocinadore->id]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $patrocinadore->id }}"
                                        action="{{ route('patrocinadores.destroy', ['patrocinadore' => $patrocinadore->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $patrocinadore->id }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $patrocinadores->previousPageUrl() }}">Voltar</a>
                    </li>
                    @for ($i = 1; $i <= $patrocinadores->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $patrocinadores->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $patrocinadores->nextPageUrl() }}">Avançar</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
