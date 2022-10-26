<?php

namespace App\Exports;

use App\Models\Jogos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class jogosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jogos::all();
    }
    public function headings(): array
    {
        return [
            'ID Jogo ',
            'Equipa adversária',
            'Resultado',
            'Data',
            'Link',
            'Equipa',
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_jogo,
            $linha->equipa_visitante,
            $linha->resultado,
            $linha->data,
            $linha->link,
            $linha->equipa->nome
        ];
    }
}
