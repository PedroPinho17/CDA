<?php

namespace App\Exports;

use App\Models\Patrocinadores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class patrocinadoresExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patrocinadores::all();
    }
    public function headings(): array
    {
        return [
            'ID Patrocinio',
            'Nome Patrocinio',
            'Descrição',
            'Link',
            'Foto'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id,
            $linha->nome,
            $linha->descricao,
            $linha->link,
            $linha->foto
        ];
    }
}
