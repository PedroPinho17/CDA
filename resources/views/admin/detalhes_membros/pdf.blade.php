<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
    .page-break {
        page-break-after: always;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    .title {
        text-align: center;
        font-size: 20pt;
        font-weight: bold;
        text-transform: capitalize;
    }

    .titulo {
        border: 1px;
        background-color: #2fa866;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .principal {
        border: 1px;
        background-color: #2fa866;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .dados {
        border: 1px;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    table th {
        text-align: center;
    }

    img {
        float: left;
        font-size: 1rem;
        color: black;
        width: 13.5rem;
        height: 13.5rem;
    }
</style>

<body>

    <h1 class="title">Clude Desportivo Arrifanense</h1>
    <div class="titulo">Lista de Membros</div>

    <table style="width: 100%;">
        <thead>
            <tr>
                <td class="principal">ID Membro</td>
                <td class="principal">Nome Membro</td>
                <td class="principal">Função</td>
                <td class="principal">Foto</td>
                <td class="principal"> Cargo: </td>
            </tr>
        </thead>

        <tbody>
            @foreach ($detalhes_membros as $key => $membro)
                <tr>
                    <td class="dados">{{ $membro->id_detalhe_membro }}</td>
                    <td class="dados">{{ $membro->nome_membro }}</td>
                    <td class="dados">{{ $membro->cargo }}</td>
                    <td class="dados">{{ $membro->foto }}</td>
                    <td class="dados">{{ $membro->membro->nome }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>

</html>
