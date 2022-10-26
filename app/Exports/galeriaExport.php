<?php

namespace App\Exports;

use App\Models\Galeria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class galeriaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Galeria::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Titulo',
            'Descrição',
            'Link',
            'Foto',
        ];
    }
    public function map($linha): array
    {
        return [
            $linha->id,
            $linha->titulo,
            $linha->descricao,
            $linha->link,
            $linha->foto,
        ];
    }
}
