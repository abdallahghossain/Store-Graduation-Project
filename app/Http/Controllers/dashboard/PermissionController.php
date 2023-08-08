<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index()
    {
        //
        $permissions = Permission::paginate(10);
        return response()->view('dashboard.authorization.permissions.index' , compact('permissions'));
    }
}
