<!--Nav markup goes here-->
    <header id="home">
        <div class="container">
            <nav>
                <div class="menu-icons">
                    <i class="icon ion-md-menu"></i>
                    <i class="icon ion-md-close"></i>
                </div>
                <a href="{{route('site.index')}}" class="logo">
                    <img src="{{asset('img/clube/logo_arrifana.png')}}" alt="Logotipo">
                </a>
                <ul class="nav-list">
                    <li>
                        <a href="{{route('site.index')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">Clube
                            <i class="icon ion-md-arrow-dropdown"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{route('site.historia')}}">História</a></li>
                            <li><a href="{{route('site.presidente')}}">Presidente</a></li>
                            <li><a href="{{ url('clube/membros/direção') }}">Membros</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('clube/membros/direção') }}">Direção</a></li>
                                    <li><a href="{{ url('clube/membros/socios') }}">Assembleia geral de sócios</a></li>
                                    <li><a href="{{ url('clube/membros/fiscal') }}">Conselho Fiscal</a></li>
                                    <li><a href="{{ url('clube/membros/vogais') }}">Vogais da Direção</a></li>
                                    <li><a href="{{ url('clube/membros/funcionarios') }}">Funcionários do Clube</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('site.campos')}}">Campos</a></li>
                            <li><a href="{{route('site.galeria')}}">Galeria</a></li>
                            <li><a href="{{route('site.patrocinadores')}}">Patrocinadores</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('jogadores/seniores') }}">Futebol
                            <i class="icon ion-md-arrow-dropdown"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('jogadores/seniores') }}">Seniores</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('jogadores/seniores') }}">Plantel</a></li>
                                    <li><a href="{{ url('jogadores/EquipaTecnicaSeniores') }}">Equipa técnica</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('jogadores/juniores') }}">Juniores</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('jogadores/juniores') }}">Plantel</a></li>
                                    <li><a href="{{ url('jogadores/EquipaTecnicaJuniores') }}">Equipa técnica</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('site.loja')}}">Loja</a>
                    </li>
                    <li>
                        <a href="{{ route('site.contato', ['reservar' => 0]) }}">Contacto</a>
                    </li>
                    <li class="move-right btn-m">
                        <a href="{{ route('login') }}">Área Reservada</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
<!--End nav-->
