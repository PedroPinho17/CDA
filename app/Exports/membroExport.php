<?php

namespace App\Exports;

use App\Models\Membro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class membroExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Membro::all();
    }
    public function headings(): array
    {
        return [
            'ID Cargo ',
            'Nome Cargo ',
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id,
            $linha->nome
        ];
    }
}
