<?php

namespace App\Exports;

use App\Models\Presidente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class presidenteExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Presidente::all();
    }
    public function headings(): array
    {
        return [
            'ID Presidente',
            'Nome Presidente',
            'Ano Inicial',
            'Ano Final',
            'Foto'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id,
            $linha->nome,
            $linha->ano_inicio,
            $linha->ano_final,
            $linha->foto
        ];
    }
}
