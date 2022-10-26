<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon rotate-n-1">
            <!--<i class="fas fa-laugh-wink"></i>-->
            <img src="{{ asset('img/clube/logo_arrifana.png') }}" alt="Logotipo do Arrifana"
                style="width:3rem; height:3rem;">
        </div>
        <!--<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>-->
        <div class="sidebar-brand-text mx-3">Clube Desportivo Arrifanense</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
{{--
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
--}}
    <!-- Heading -->
    <div class="sidebar-heading">
        Administrador
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="true" aria-controls="collapseFour">
            <i class="fa-solid fa-user-tie"></i>
            <span> Utilizadores</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Personalizar:</h6>
                <a class="collapse-item" href="{{ route('user.index') }}">Users</a>
                <a class="collapse-item" href="{{ route('tipoUser.index')}}">Tipo de Users</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('task.index') }}">
            <i class="fa-solid fa-list-check"></i>
            <span>Tarefas</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">
            <i class="fa-solid fa-id-card"></i>
            <span>Posts</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Clube
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('presidente.index') }}">
            <i class="fa-solid fa-user-tie"></i>
            <span>Presidente</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-user-tag"></i>
            <span>Cargos - Membros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Personalizar:</h6>
                <a class="collapse-item" href="{{ route('membro.index') }}">Cargos</a>
                <a class="collapse-item" href="{{ route('detalhe-membro.index') }}">Membros</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('patrocinadores.index') }}">
            <i class="fa-solid fa-people-group"></i>
            <span>Patrocinadores</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('galeria.index') }}">
            <i class="fa-solid fa-images"></i>
            <span>Galeria</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Futebol
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('escalao.index') }}">
            <i class="fa-solid fa-braille"></i>
            <span>Escalão</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('equipa.index') }}">
            <i class="fa-solid fa-user-plus"></i>
            <span>Equipas</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fa-solid fa-person-military-pointing"></i>
            <span>Treinadores</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Personalizar:</h6>
                <a class="collapse-item" href="{{ route('equipaTec.index') }}">Equipa Técnica</a>
                <a class="collapse-item" href="{{ route('tpFuncao-equipaTec.index') }}">Função Treinador</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-people-line"></i>
            <span>Jogadores</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Screen Jogador:</h6>
                <a class="collapse-item" href="{{ route('jogadores.index') }}">Jogadores</a>
                <a class="collapse-item" href="{{ route('detalhes_jogadores.index') }}">Detalhes Jogadores</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Jogos - Link:</h6>
                <a class="collapse-item" href="{{ route('jogos.index') }}">Jogos</a>
                <a class="collapse-item" href="{{ route('afa.index') }}">Link dos Jogos</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Loja - Produtos
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('loja.index') }}">
            <i class="fa-solid fa-shop"></i>
            <span>Loja</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('estadoProdutos.index') }}">
            <i class="fa-solid fa-bars-progress"></i>
            <span>Estado dos Produtos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
