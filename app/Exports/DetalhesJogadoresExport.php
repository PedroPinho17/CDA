<?php

namespace App\Exports;

use App\Models\DetalhesJogadores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DetalhesJogadoresExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetalhesJogadores::all();
    }
    public function headings(): array
    {
        return [
            'ID   ',
            'Nome',
            'Nascimento',
            'Naturalidade',
            'Info',
            'Link'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id,
            $linha->nome_completo,
            $linha->data_nascimento,
            $linha->Naturalidade,
            $linha->info,
            $linha->link
        ];
    }
}
