<?php

namespace App\Exports;

use App\Models\Detalhe_Membro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class detalheMembroExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Detalhe_Membro::all();
    }
    public function headings(): array
    {
        return [
            'ID membro',
            'Nome Membro',
            'Função',
            'foto',
            'Cargo'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_detalhe_membro,
            $linha->nome_membro,
            $linha->cargo,
            $linha->foto,
            $linha->membro->nome
        ];
    }
}
