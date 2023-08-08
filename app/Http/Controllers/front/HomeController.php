<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = Slider::active()->get();
        $search = $request->get('search', '');
        $products = Product::with('category')->search($search)->active()->limit(8)->paginate(8);

        return response()->view('front.index', compact('products', 'search','data'));
    }
    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');

        // Get the category name based on the category ID
        $category = Category::find($categoryId);

        // Fetch data from YourModel filtered by the category name
        $filteredData = Product::where('category', $category->name)->get();

        return response()->json($filteredData);
    }
    public function ShowAllProducts(Request $request)
    {
        if ($request->search) {
            $products = Product::with('category')->active()->where('name','like','%',$request->search.'%')->latest()->paginate(8);

            }elseif ($request->category){
                $products=Category::active()->where('name',$request->category)->firstOrFail()->products()->paginate(8);
            }else{
                $products = Product::active()->latest()->simplePaginate(6);
            }
            $categories=Category::active()->get();
        return response()->view('front.shop', compact('products','categories'));
    }


    public function contact()
    {
        $contact = contact::all();
        return response()->view('front.contact',compact('contact'));
    }
    public function blog()
    {
        $blog = blog::latest()->paginate(4);
        return response()->view('front.blog',compact('blog'));
    }


}
