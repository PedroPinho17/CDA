<?php

namespace App\Exports;

use App\Models\tpFuncao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class tpFuncaoTreinadorExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tpFuncao::all();
    }
    public function headings(): array
    {
        return [
            'ID Treinador ',
            'Nome Treinador ',
            'Função',
            'Foto Treinador',
            'Equipa Técnica',
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id,
            $linha->nome_treinador,
            $linha->funcao,
            $linha->foto_treinador,
            $linha->equipaTecnica->nome
        ];
    }
}
