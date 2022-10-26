@extends('layouts.master')

@section('content')
                <div class="card">
                    <div class="card-header">
                        Posts
                        @if ($verification == null)
                            <a href="{{ route('posts.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                                    src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Post"> </a>
                            <a href="{{ route('posts.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                                style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS">
                            </a>
                            <a href="{{ route('posts.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                                    src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
                        @else
                            <br>
                            Procurar por: <strong>{{ $verification }}</strong>
                            <a href="{{ route('posts.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                                    src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Post"> </a>
                            <a href="{{ route('posts.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                                style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS">
                            </a>
                            <a href="{{ route('posts.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                                    src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
                        @endif  
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($posts as $post)
                                <div class="col" style="margin-bottom: 2rem;">
                                    <div class="card h-100">
                                        <img src="/storage/posts/{{ $post->foto }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align:center;">{{ $post->id_post }} -
                                                {{ $post->titulo }}</h5>
                                            <p class="card-text" style="text-align:center;">{{ $post->descricao }}</p>
                                            <p class="card-text"><small class="text-muted"><a href="{{ $post->link }}"
                                                        target="_blank">{{ $post->link }}</a></small></p>
                                            <p class="card-text">{{ $post->user_id }} - {{ $post->user->name }} ->
                                                {{ date('d-m-Y', strtotime($post->data)) }} </p>
                                        </div>
                                        <div class="card-footer" style="display: flex;">
                                            <div style=" display: flex; text-align: center; margin: 0 auto;">
                                                <td><a href="{{ route('posts.show', ['post' => $post->id_post]) }}"><img
                                                            src="{{ asset('img/clube/visualizar.png') }}"
                                                            alt="Visualizar"></a></td>
                                                <td> <a href="{{ route('posts.edit', ['post' => $post->id_post]) }}"><img
                                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"
                                                            style="margin-right: 0.8rem; margin-left: 0.8rem;"></a></td>
                                                <td>
                                                    <form id="form_{{ $post->id_post }}"
                                                        action="{{ route('posts.destroy', ['post' => $post->id_post]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#"
                                                            onclick="document.getElementById('form_{{ $post->id_post }}').submit()"><img
                                                                src="{{ asset('img/clube/eliminar.png') }}"
                                                                alt="Eliminar"></a>
                                                    </form>
                                                </td>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="{{ $posts->previousPageUrl() }}">Voltar</a></li>
                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Avançar</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
@endsection
