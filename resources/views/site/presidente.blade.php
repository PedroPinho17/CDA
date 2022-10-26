@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')
    <!--Main-->
    <h3 class="title"> Presidentes </h3>
    <div class="info-container">
        <img class="profile" id="profile" src="/storage/foto_presidente/{{ $ultimo_presidente[0]->foto }}"
            alt="{{ $ultimo_presidente[0]->nome }}">
        <div class="info">
            <h1 class="name" id="name">{{ $ultimo_presidente[0]->nome }}</h1>
            <h3 class="status" id="status">Presidente</h3>
            <p class="about" id="about">
                <span class="ano"> Ano inicial:</span> <span
                    id="text">{{ $ultimo_presidente[0]->ano_inicio }}</span> <br>
                <span class="ano">Ano final:</span> <span id="text">{{ $ultimo_presidente[0]->ano_final }}</span>
                <br>
                <span id="text">Este presidente {{ $ultimo_presidente[0]->nome }}, foi o
                    {{ $ultimo_presidente[0]->id }} presidente do Clube Desportivo Arrifanense de
                    {{ $ultimo_presidente[0]->ano_inicio }} até {{ $ultimo_presidente[0]->ano_final }}.</span>
            </p>
        </div>
    </div>

    <div class="accordion">
        @foreach ($presidentes as $presidente)
            <div class="accordion-item">
                <div class="accordion-item-header">
                    <img class="mini-presi" src="/storage/foto_presidente/{{ $presidente->foto }}"
                        alt="{{ $presidente->nome }} ">
                    <span>{{ $presidente->nome }} ( {{ $presidente->ano_inicio }} - {{ $presidente->ano_final }} )</span>
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        <img class="img-presi" src="/storage/foto_presidente/{{ $presidente->foto }}"
                            alt="{{ $presidente->nome }} ">
                        <div class="text-presi">
                            <p class="text-pequeno">Este presidente {{ $presidente->nome }}, foi o {{ $presidente->id }}
                                presidente do Clube Desportivo Arrifanense de {{ $presidente->ano_inicio }} até
                                {{ $presidente->ano_final }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--End main-->

@endsection
