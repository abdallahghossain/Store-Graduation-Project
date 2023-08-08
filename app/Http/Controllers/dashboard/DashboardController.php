<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\blog;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Slider;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = admin::count();
        $totalProd = Product::count();
        $totalCateg = Category::count();
        $totalSlid = Slider::count();
        $totalCoupon = Coupon::count();
        $totalBlogs = blog::count();

        return view('dashboard.index', compact('totalUsers', 'totalAdmins' , 'totalProd' , 'totalCateg', 'totalSlid' , 'totalCoupon' , 'totalBlogs'));
    }
}
