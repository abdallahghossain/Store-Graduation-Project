<?php

namespace App\Http\Controllers\dashboard;

use App\Exports\Products;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidate;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageTrait;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        //

        $search = $request->get('search', '');
        $products = Product::with('category')->search($search)->paginate(8);
        // dd($products->toArray());
        return response()->view('dashboard.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
      if($request->category){
        $products=Category::where('name',$request->category)->firstOrFail()->products()->paginate(8);
    }else{
        $products = Product::latest()->paginate(8);
    }
    $categories=Category::all();
    $parents=Product::all();
        return response()->view('dashboard.products.create', compact('parents','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductValidate $request)
    {
        //
        $file_name = $this->saveImage($request->image, 'images/product');
        Product::create([
            'name' => $request->name,
            'status' => $request->status,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'compare_price' => $request->compare_price,
            'image' => $file_name
        ]);

        return redirect()->route('products.index')->with('success', 'product created Successfuly!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories=Category::all();
        $product = product::findOrFail($id);
        return response()->view('dashboard.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductValidate $request, string $id)
    {
        //
        $file_name = $this->saveImage($request->image, 'images/product');
        $product = product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->status = $request->status;
        $product->image = $file_name;
        $product->save();
        return redirect()->route('products.index')->with('success', 'product updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('error', 'Product Deleted!');
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->paginate();
        return response()->view('dashboard.products.trash', ['products' => $products]);
    }
    public function restore($id)
    {
        $Product = Product::onlyTrashed()->findOrFail($id);
        $Product->restore();
        return redirect()->back();
    }
    public function forceDelete($id)
    {
        $Product = Product::onlyTrashed()->findOrFail($id);
        $Product->forceDelete();
        if ($Product->image) {
            Storage::disk('public')->delete($Product->image);
        }
        return redirect()->route('products.trash');
    }
    public function export(Request $request){

        $request->validate([
            "file" =>'required|mimes:csv,xlsx,docs'
        ]);
        return Excel::download(new Products(),'products.xlsx');
    }
    public function import(){
         Excel::import(new ProductsImport(),request()->file('file')->store('files'));
         return redirect()->route('products.index');
    }

}
