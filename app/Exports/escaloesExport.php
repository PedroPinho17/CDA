<?php

namespace App\Exports;

use App\Models\Escalao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class escaloesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Escalao::all();
    }
    public function headings(): array
    {
        return [
            'ID Escalão ',
            'Nome Escalão ',
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_escalao,
            $linha->nome_escalao
        ];
    }
}
