<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidate;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageTrait;

class CategoryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:category-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        //
        $search = $request->get('search', '');
        $categories = category::withCount('products')->search($search)->latest()->paginate(8);
        return response()->view('dashboard.categories.index', compact('categories','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $parents = category::all();
        return response()->view('dashboard.categories.create', ['parents' => $parents]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryValidate $request)
    {
        $file_name = $this->saveImage($request->image,'images/category');
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $file_name
        ]);
        return Redirect::route('categories.index')->with('success', 'Category created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $category = category::findOrFail($id);
        return response()->view('dashboard.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryValidate $request, string $id)
    {
        //
        $file_name = $this->saveImage($request->image,'images/category');
        $category = category::findOrFail($id);
        $category->name                 = $request->name;
        $category->description          = $request->description;
        $category->status               = $request->status;
        $category->image = $file_name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
    public function trash()
    {
        $categories = category::onlyTrashed()->paginate();
        return response()->view('dashboard.categories.trash', ['categories' => $categories]);
    }
    public function restore($id)
    {
        $category = category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.index');
    }
    public function forceDelete($id)
    {
        $category = category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->route('categories.trash');
    }
}
