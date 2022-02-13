<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->where('status', 1)->take(5)->get();
        $trendings = Product::where('trending', 1)->get();

        return view('frontend.index', compact('latestProducts', 'trendings'));
    }
}
