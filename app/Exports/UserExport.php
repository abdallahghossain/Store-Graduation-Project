<?php

namespace App\Exports;

use App\Models\User;
// use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;

class UserExport implements FromQuery
{

    // public function array():array
    // {
    //     $list = [];
    //     $users = User::all();
    //     foreach ($users as $user) {
    //         $list[] = [
    //             $user->name, $user->email, $user->address,
    //             $user->mobile
    //         ];
    //     }
    //     return $list;
    // }
    
    public function query()
    {
        return User::query();
    }
}
