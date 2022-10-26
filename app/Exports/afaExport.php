<?php

namespace App\Exports;

use App\Models\Link;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class afaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Link::all();
    }
    public function headings(): array
    {
        return [
            'ID do Link',
            'Link',
            'Equipa'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id,
            $linha->link,
            $linha->equipa->nome
        ];
    }
}
