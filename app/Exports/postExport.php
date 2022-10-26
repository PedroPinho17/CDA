<?php

namespace App\Exports;

use App\Models\Posts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class postExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Posts::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Titulo',
            'Descricao',
            'Data',
            'Link',
            'Foto',
            'Utilizador',
        ];
    }
    public function map($linha): array
    {
        return [
            $linha->id_post,
            $linha->titulo,
            $linha->descricao,
            $linha->data,
            $linha->link,
            $linha->foto,
            $linha->user->name
        ];
    }
}
