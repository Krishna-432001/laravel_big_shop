<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend/home');
    }

    public function page_not_found(Request $request)
    {
        return view('frontend/page_not_found');
    }
}
