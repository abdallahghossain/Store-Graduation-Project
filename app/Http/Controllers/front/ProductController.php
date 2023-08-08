<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //
    public function show(Product $product)
    {
        //
        if (!$product->status == "active" ) {
            abort(403);
        }
        $reviews = $product->reviews()->with('user')->get();
        return view('front.single-product',compact('product','reviews'));
    }
    public function rate(Request $request, Product $product)
    {
        $request->validate([
            'rating' =>'required|numeric|min:1|max:5',
            'comment' =>'sometimes|nullable|string|max:256',
        ]);
        if (Auth::guard('web')->user()) {
            $user = Auth::guard('web')->user();
            if ($user->hasRatedProduct($product)) {
                throw ValidationException::withMessages([
                    'rating' => 'You have already rated this product.',
                ]);
            }
            $rating = $request->input('rating');
            $comment = $request->input('comment');
            $review = new Review();
            $review->user_id = Auth::guard('web')->id();
            $review->product_id = $product->id;
            $review->rating = $rating;
            $review->comment = $comment;
            $review->save();
            return redirect()->back()->with('success', 'Rating submitted successfully.');
        }else{
            return redirect()->back()->with('error','please SignIn for rating');
        }

    }

    // public function review(Request $request, Product $product)
    // {
    //     $comment = $request->input('comment');

    //     $review = new Review();
    //     $review->admin_id = Auth::guard('admin')->id();
    //     $review->product_id = $product->id;
    //     $review->comment = $comment;
    //     $review->save();

    //     // You can add additional logic here (e.g., sending notifications)

    //     return redirect()->back()->with('success', 'Review submitted successfully.');
    // }


}
