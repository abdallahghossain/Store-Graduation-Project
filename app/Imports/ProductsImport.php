<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            //
            "category_id"=>$row[0],
            'name'=>$row[1],
            'price'=>floatval($row[2]),
            'compare_price'=>floatval($row[3]),
            'description' => $row[4],
            // 'image'=>'',
            'status'=>$row[5],
            'quantity'=>$row[6]

        ]);
    }
}
