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
        return User::select('name','last_name','email','phone','company_name','country','address_one','postcode','state','city')->where('is_admin',0)->get();
    }


      public function headings(): array
    {
         return [
            "First Name",
            "Last Name",
            "Email",
            "Phone",
            "Company Name",
            "Country",
            "Address",
            "Postcode",
            "State",
            "City"

        ];
    }
}
