<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductShow extends Controller
{
    //
    public function index(Request $request)
    {
        $perPage = 12;

        // Filter data by category
        // $query = Product::where('name', 'Panjabi');


        // $category = $request->query('category');
        $query = Product::query();

        // Apply filters based on query parameters

        // if ($category) {
        //     $query->where('category', $category);
        // }
        if ($category = $request->query('category')) {
            $query->where('category', $category);
        }


        // Search functionality
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        // Execute the query
        // $products = $query->get();

        // Paginate the results
        $products = $query->paginate($perPage);
         // Return filtered products
         return response()->json($products);

        // return response()->json($query);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
