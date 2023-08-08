<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\CartOps;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addToCart(string $id)
    {
        if (Auth::guard('web')->check()) {
            $product = product::find($id);
            $cart = new CartOps();
            $cart->addToCart($product);

            return back();
        } else {
            return redirect('front/userLogin');
        }
    }

    public function showCart()
    {
        $cart = session('cart', [
            'total_price' => 0,
            'items' => collect()
        ]);
        return response()->view('front.cart', compact('cart'));
    }

    public function delete($id)
    {
        $cart = session()->get('cart', []);
        foreach ($cart['items'] as $index => $item) {
            if ($item['object']->id == $id) {
                unset($cart['items'][$index]);
                break;
            }
        }
        session()->put('cart', $cart);
        return response()->json(['message' => 'Item deleted successfully',
        'icon'=>'success'
    ]);
    }
    public function decreaseQty(string $id)
    {
        $product = Product::find($id);
        $cart = new CartOps();
        $cart->decrease($product);
        return back();
    }
}
