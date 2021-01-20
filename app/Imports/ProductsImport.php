<?php

namespace App\Imports;

use App\Models\Product;
// use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id' => $row['category_id'],
            'product_title' => $row['product_title'],
            'product_slug' => $row['product_slug'],
            'product_price' => $row['product_price'],
            'product_image' => $row['product_image'],
        ]);
    }
}
