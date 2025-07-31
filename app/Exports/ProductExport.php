<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('products.title','products.slug',
        'products.sku',
        'products.price','products.old_price',
        'categories.name',
        'sub_categories.name as sub_category',
        'brands.name as brand_name')
        ->join('categories','categories.id','products.category_id')
        ->join('sub_categories','sub_categories.id','products.sub_category_id')
        ->join('brands','brands.id','products.brand_id')->get();


    }

     public function headings(): array
    {
         return [
            "Title",
            "Slug",
            "SKU",
            "Price",
            "Old Price",
            "Category Name",
            "Sub_Category Name",
            "Brand Name"

        ];
    }
}