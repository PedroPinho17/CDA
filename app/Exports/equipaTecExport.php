<?php

namespace App\Exports;

use App\Models\EquipaTecnica;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class equipaTecExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EquipaTecnica::all();
    }
    public function headings(): array
    {
        return [
            'ID Equipa Tecnica ',
            'Nome',
            'foto'
        ];
    }
    public function map($linha): array
    {
        return [

            $linha->id_equipaTec,
            $linha->nome,
            $linha->foto
        ];
    }
}
