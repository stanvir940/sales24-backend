<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProductController extends Controller
{
    //this method will show products page
    public function index() {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('products.list',[
            'products' => $products
        ]);
    }

    //this method will create a product page
    public function create() {
        return view('products.create');
    }

    //this method will store a product in db
    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator =  Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
        // here we will insert product in db
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->save();

        if($request->image != ""){
            // storing image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            // save image to products directory
            $image->move(public_path('uploads/products'),$imageName);

            // save image name in database 
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success','Product added successfully');
    }

    //this method will show edit page
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit',[
            'product' => $product
        ]);
    }

    //this method will update a product
    public function update($id, Request $request) {
        $product = Product::findOrFail($id);
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if($request->image != ""){
            $rules['image'] = 'image';
        }

        $validator =  Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
        }
        // here we will update product in db

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->save();

        if($request->image != ""){
            // delete old image
            File::delete(public_path('uploads/products/'.$product->image));

            // storing image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            // save image to products directory
            $image->move(public_path('uploads/products'),$imageName);

            // save image name in database 
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success','Product updated successfully');

    }

    //this method will delete a product in db
    public function destroy($id) {
        $product = Product::findOrFail($id);
        // delete image
        File::delete(public_path('uploads/products/'.$product->image));

        //delete product from db
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
