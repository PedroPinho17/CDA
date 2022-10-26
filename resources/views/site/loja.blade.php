@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')

    <!--Loja-->
    <h3 class="title"> Loja - CD Arrifanense</h3>
    <div class="container-l">
        <div class="products-container">
            @foreach ($produtos as $produto)
                <div class="product" data-name="p-{{ $produto->id_produto }}">
                    <img class="medida" src="/storage/foto_produto/{{ $produto->foto_produto }}"
                        alt="{{ $produto->nome_produto }}">
                    <h3>{{ $produto->nome_produto }}</h3>
                    <div class="price"> {{ $produto->valor }} € </div>
                    <div class="estado">
                        @if ($produto->estado_produto_id == 1)
                            <p style=" text-align: center; color: #20F539">
                                <i class="fa-solid fa-circle-check"
                                    style="margin-right:0.5rem;"></i>{{ $produto->estadoProduto->Estado }}
                            </p>

                        @else
                            <p style=" text-align: center; color: #F62B1D">
                                <i class="fa-solid fa-circle-xmark"
                                    style="margin-right:0.5rem;"></i>{{ $produto->estadoProduto->Estado }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="products-preview">
        @foreach ($produtos as $produto)
            <div class="preview" data-target="p-{{ $produto->id_produto }}">
                <i class="fas fa-times"></i>
                <img class="medida-1" src="/storage/foto_produto/{{ $produto->foto_produto }}"
                    alt="{{ $produto->nome_produto }}">
                <h3>{{ $produto->nome_produto }}</h3>
                @if ($produto->estado_produto_id == 1)
                    <p style="color: #20F539">
                        <i class="fa-solid fa-circle-check" style="margin-right:0.5rem;"></i>{{ $produto->estadoProduto->Estado }}
                    </p>
                @else
                    <p style="color: #F62B1D">
                        <i class="fa-solid fa-circle-xmark"
                            style="margin-right:0.5rem;"></i>{{ $produto->estadoProduto->Estado }}
                    </p>
                @endif
                <div class="price">{{ $produto->valor }} €</div>
                @if ($produto->estado_produto_id == 1)
                <div class="buttons">
                    <a href="{{ route('site.contato', ['reservar' => 1]) }}" class="buy">Reservar</a>
                </div>
                @endif

            </div>
        @endforeach
    </div>
    <!--End Loja-->


@endsection
