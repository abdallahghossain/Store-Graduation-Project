<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogValidate;
use App\Models\blog;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = blog::all();
        return response()->view('dashboard.blog.index', ['blog' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogValidate $request)
    {
        //

        $file_name = $this->saveImage($request->image, 'images/blog');
        blog::create([
            "name" => $request->input('name'),
            "url" => $request->input('url'),
            "date" => $request->input('data'),
            "description" => $request->input('description'),
            "image"=>$file_name,
        ]);
        return redirect()->back();
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
        $data = blog::find($id);
        return response()->view('dashboard.blog.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogValidate $request, string $id)
    {
        //
        $file_name = $this->saveImage($request->image, 'images/blog');
        $data = blog::find($id);
        $data->name = $request->input('name');
        $data->url = $request->input('url');
        $data->date = $request->input('data');
        $data->description = $request->input('description');
        $data->image=$file_name;
        $data->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deleteCount = blog::destroy($id);
        return redirect()->back();
    }
}
