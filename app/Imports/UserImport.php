<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $hashedPassword = Hash::make($row['password']);
        return new User([
            "name"=>$row["name"],
            "email"=>$row["email"],
            "address"=>$row["address"],
            "password"=>$hashedPassword,
            'mobile'=>$row["mobile"]
        ]);
    }
}
