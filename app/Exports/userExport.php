<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class userExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Email',
            'Verificado',
        ];
    }
    public function map($linha): array
    {
        return [
            $linha->id,
            $linha->name,
            $linha->email,
            $linha->email_verified_at,
        ];
    }
}
