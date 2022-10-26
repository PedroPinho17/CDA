@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')

        <h3 class="title"> Galeria - CD Arrifanense</h3>
        <!--Galeria-->
            <div class="gallery">
                    @foreach ( $galerias as  $galeria)
                    <div class="gallery-item">
                        <img src="/storage/galeria/{{$galeria->foto}}" alt="{{$galeria->nome}} - {{$galeria->id}}">
                    </div>
                    @endforeach
            </div>
        <!--Fim da Galeria-->

@endsection
