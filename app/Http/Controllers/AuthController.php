<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\City;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        // dd($request);
        // Retrieve all cities for use in the view
        $cities = City::all();

        // Retrieve all categories for use in the view
        $categories = Category::all();


        // Initialize data array
        $data = [
            'categories' => $categories,
            'cities' => $cities,
         ];
        return view('frontend/auth/login',$data);
    }

    public function register(Request $request)
    {
        // dd($request);
        // Retrieve all cities for use in the view
        $cities = City::all();

        // Retrieve all categories for use in the view
        $categories = Category::all();


        // Initialize data array
        $data = [
            'categories' => $categories,
            'cities' => $cities,
         ];
        return view('frontend/auth/register',$data);
    }

    public function forget_password(Request $request)
    {
        return view('frontend/auth/forget_password');
    }

    public function reset_password(Request $request)
    {
        return view('frontend/auth/reset_password');
    }

    public function my_account(Request $request)
    {
        // dd($request);
        // Retrieve all cities for use in the view
        $cities = City::all();

        // Retrieve all categories for use in the view
        $categories = Category::all();


        // Initialize data array
        $data = [
            'categories' => $categories,
            'cities' => $cities,
         ];
         
        return view('frontend/auth/my_account',$data);
    }


  

}
