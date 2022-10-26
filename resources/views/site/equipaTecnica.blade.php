@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')
<div class="player">
    <h3 class="title">{{$treinadores[0]->equipaTecnica->nome}}</h3>
    <picture>
            <img style="height: 600px;" src="/storage/fotos_equipa_tecnica/{{$treinadores[0]->equipaTecnica->foto}}" alt="{{$treinadores[0]->equipaTecnica->foto}}">
    </picture>
    <div class="card-container">
        @foreach ($treinadores as $treinador )
            <div class="card-2"><!--Card-2-->
                <div class="card-image-2">
                    @if($treinador->id_equipaTec == 1)
                        <img src="/storage/treinadores/seniores/{{$treinador->foto_treinador}}" alt="{{$treinador->nome_treinador}}">
                    @elseif($treinador->id_equipaTec == 2)
                        <img src="/storage/treinadores/juniores/{{$treinador->foto_treinador}}" alt="{{$treinador->nome_treinador}}">
                    @endif
                </div>
                <div class="card-text-2">
                    <p class="number-name">{{$treinador->nome_treinador}} </p>
                    <p class="elemento"> {{$treinador->funcao}} </p>
                    <!--<p> lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
                </div>
            </div><!--End of Card-2-->
        @endforeach
    </div>
</div>
@endsection
