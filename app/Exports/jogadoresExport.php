<?php

namespace App\Exports;

use App\Models\Jogadores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class jogadoresExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jogadores::all();
    }
    public function headings(): array
    {
        return [
            'ID Jogador ',
            'Nome Jogador ',
            'Peso',
            'Altura',
            'Número de Camisola',
            'Posição',
            'Foto',
            'Escalão',
            'Equipa',
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_jogador,
            $linha->nome,
            $linha->peso,
            $linha->altura,
            $linha->numero_camisola,
            $linha->posicao,
            $linha->foto,
            $linha->escalao->nome_escalao,
            $linha->equipa->nome,
        ];
    }
}
