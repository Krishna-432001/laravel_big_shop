<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

use App\Models\City;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all cities for use in the view
        $cities = City::all();

        // Retrieve all categories for use in the view
        $categories = Category::all();
        
        // Start building the query for products
        // $query = Product::query();

        // Start building the query for products
        $query = Product::with('productLabel'); // Eager load productLabels        
        
        // Initialize data array
        $data = [
            'product' => $query->get(),
            'categories' => $categories,
            'cities' => $cities,
         ];
        
        // Apply search filter if search term is present
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', "%{$searchTerm}%");
        }

        // Apply category filter if category is present and is not 'All'
        if ($request->has('category') && $request->category != 'All') {
            // $query->where('category_id', $request->category);
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
            
            // Set page title based on the selected category
            $category = Category::find($request->category);
            $data['page_title'] = $category ? $category->name : 'Category';
            $data['product_count'] = $category ? $category->products()->count() : 0;

            // dd($category->products()->count());
        }
        
        // Update products after applying filters
        $data['product'] = $query->get();        

        // dd($data['product']);

        // Return the appropriate view based on the category filter
        if ($request->has('category') && $request->category != 'All') {            
            return view('frontend/product/list/type1', $data);
        }
        
        return view('frontend/home', $data);
    }

    public function show($id)
    {
        // dd($id);

        // Retrieve all cities for use in the view
        $cities = City::all();

        // Retrieve all categories for use in the view
        $categories = Category::all();

        $product = Product::findOrFail($id);

        // Initialize data array
        $data = [
            'product' => $product,
            'categories' => $categories,
            'cities' => $cities,
        ];

        // dd($data);

        return view('frontend/product/detail/type1', $data);
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

    public function sendEmailManually()
    {
        $recipient = 'vprabhu1771@gmail.com'; // Replace with actual recipient's email
        $subject = 'Custom Subject';
        $body = 'This is the body of the email. You can include HTML here if needed.';

        Mail::raw($body, function(Message $message) use ($recipient, $subject) {
            $message->to($recipient);
            $message->subject($subject);
            // You can add attachments or other options here if needed
        });

        return "Email sent successfully!";
    }

}
