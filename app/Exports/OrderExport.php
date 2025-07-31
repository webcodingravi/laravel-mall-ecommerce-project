<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class OrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::select("order_number",
        "first_name","last_name",
        "company_name","country","address_one","city",
        "state","postcode",
        "phone","email","discount_code","discount_amount","shipping_amount","total_amount","payment_method")->get();
    }


     public function headings(): array
    {
         return [
            "Order Number",
            "First Name",
            "Last Name",
            "Company Name",
            "Country",
            "Address",
            "City",
            "State",
            "Postcode",
            "Phone",
            "Email",
            "Discount Code",
            "Discount Amount",
            "Shipping Amount",
            "Total Amount",
            "Payment Method"
        ];
    }
}
