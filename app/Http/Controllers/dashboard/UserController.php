<?php

namespace App\Http\Controllers\dashboard;

use App\Exports\EmptyExport;
use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidate;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        //
        $search = $request->get('search', '');
        $users = User::search($search)->Paginate(8);
        return response()->view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserValidate $request)
    {
        //

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'status' => $request->status,
            'password' =>Hash::make($request->password),
        ]);
        return Redirect::route('users.index')->with('success', 'User created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = DB::table('users')->where('id', '=', $id)->first();
        return response()->view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('error','User Has Been Deleted!');
    }
    public function import(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,csv',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
         Excel::import(new UserImport(),request()->file('file')->store('files'));
         return redirect()->back()->with('success', 'Data imported successfully!');;

    }
    public function export(){
        return Excel::download(new UserExport(),'users.csv');

    }
    public function exportEmptyExcel()
    {
        return Excel::download(new EmptyExport(), 'empty_file.xlsx');
    }

}
