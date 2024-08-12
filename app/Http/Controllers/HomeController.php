<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories= Category::all();

        $query = Product::query();

        // Apply filters based on the request
        if ($request->has('category') && $request->category != 'All') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', "%{$searchTerm}%");
        }

        $data = [
            'product' => $query->get(),
            'categories' => $categories
        ];

        return view('frontend/home', $data);
    }

    public function page_terms(Request $request)
    {
        return view('frontend/auth/page_terms');
    }

    public function about(Request $request)
    {
        return view('frontend/auth/about');
    }

    public function account(Request $request)
    {
        return view('frontend/auth/account');
    }

    
    public function privacy_policy(Request $request)
    {
        return view('frontend/auth/privacy_policy');
    }

    public function page_not_found(Request $request)
    {
        return view('frontend/error/page_not_found');
    }

    public function purchase_guide(Request $request)
    {
        return view('frontend/auth/purchase_guide');
    }

}
