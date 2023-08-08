<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminValidate;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:admin-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:admin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        //
        $search = $request->get('search', '');
        $admins = admin::search($search)->paginate(8);
        return response()->view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        $roles = Role::pluck('name', 'name')->all();
        return response()->view('dashboard.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminValidate $request)
    {
        //
        $admin = new admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->mobile = $request->input('mobile');
        $admin->password = Hash::make($request->input('password'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
            $admin->image = $data['image'];
        }
        $admin->roles_name = $admin->assignRole($request->input('roles_name'));
        // $admin->save();
        if ($admin->save()) {
            return back()->with('success', 'Success! Admin created');
        }
        else {
            return back()->with('failed', 'Failed! Admin not created');
        }
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $admin = admin::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $adminRole = $admin->roles->pluck('name', 'name')->all();

        return view('dashboard.admins.edit', compact('admin', 'roles', 'adminRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'mobile' => 'required|digits:10|unique:admins,id|numeric',
            'email' => 'required|unique:admins,email,' . $id,
            'address' => 'required|string|min:5|max:150',
            // 'image' => 'required|image|mimes:jpg,png,jpeg|max:3025',
            'status' => 'nullable|string|in:active,archived',
            'password' => [
                'required', 'string',
            ],
            'roles_name' => 'required',
        ]);
        $admin = admin::findOrFail($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->mobile = $request->input('mobile');
        $admin->password = Hash::make($request->input('password'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
            $admin->image = $data['image'];
        }
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $admin->roles_name = $admin->assignRole($request->input('roles_name'));
        $admin->save();


        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $admin = admin::findOrFail($id);
        $admin->delete();
        return back()->with('error', 'Admin Deleted!');
    }
}
