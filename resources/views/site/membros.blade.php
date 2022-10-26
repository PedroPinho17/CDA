@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')

        <h3 class="title">{{$elementos[0]->membro->nome}} - CD Arrifanense</h3>

        <div class="card-container">
            @foreach ($elementos as $elemento )
            <div class="card-1"><!--Card-1-->
                <div class="card-image-1">
                    <img class="fullTeam" src="/storage/Membros/{{$elemento->foto}}" alt="{{$elemento->nome_membro}}">
                </div>
                <div class="card-text-1">
                    <p class="number-name"> {{$elemento->nome_membro}} </p>
                    <span class="text-info"> Cargo: <strong>   {{$elemento->cargo}} </strong></span>
                    <p class="elemento"> Pertence a : <strong>{{$elemento->membro->nome}} </strong> </p>
                    <!--<p> lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
                </div>
            </div><!--End of Card-1-->
            @endforeach
        </div>
@endsection
