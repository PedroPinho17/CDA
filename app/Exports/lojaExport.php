<?php

namespace App\Exports;

use App\Models\Loja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class lojaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Loja::all();
    }
    public function headings(): array
    {
        return [
            'ID produto ',
            'Nome produto ',
            'Valor',
            'Foto produto',
            'Estado'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_produto,
            $linha->nome_produto,
            $linha->valor,
            $linha->foto_produto,
            $linha->estadoProduto->Estado
        ];
    }
}
