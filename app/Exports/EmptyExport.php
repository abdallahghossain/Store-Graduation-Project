<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmptyExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return collect();
    }
    public function headings(): array
    {
        // Define the column headers as an array
        return [
            'name',
            'email',
            'address',
            'password',
            'mobile',
            // Add more columns as needed
        ];
    }
}
