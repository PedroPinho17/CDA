<?php

namespace App\Exports;

use App\Models\Equipa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class equipaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Equipa::all();
    }
    public function headings(): array
    {
        return [
            'ID Equipa  ',
            'Nome',
            'Tipo de Equipa',
            'Escalão',
            'Equipa Técnica'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_equipa,
            $linha->nome,
            $linha->tipo_Equipa,
            $linha->escalao->nome,
            $linha->equipaTec->nome
        ];
    }
}
