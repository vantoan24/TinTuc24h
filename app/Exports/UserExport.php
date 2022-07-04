<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return User::select("id", "name","address","phone", "email","gender")->get();
    }

    public function headings(): array
    {
        return ["id", "name","address","phone", "email","gender"];
    }
}
