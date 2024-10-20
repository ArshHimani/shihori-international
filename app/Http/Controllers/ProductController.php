<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function product_details($productTypeName){
        $products = Product::where('product_type',$productTypeName)->get();
        // return view('product-details',['product_type'=> $products]);
        return view('product-details',['products'=> $products]);
    }

    public function products(){
        $productTypes = ProductType::all();
        return view('products',compact('productTypes'));
    }

    public function new_product(){
        $productTypes = ProductType::all();
        return view('admin.new-product',compact('productTypes'));
    }

    public function delete_product($id){
        $product = Product::find($id);

        if($product){
            $product->delete();
            return redirect()->route('admin.index');
        }
    }

    public function store(Request $request)
    {   
        $request->validate([
            'product_name' => 'required|string|max:255|unique:products,product_name',
            'product_title' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_category' => 'required|string',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('product_image')) {
            $originalName = $request->file('product_image')->getClientOriginalName();

            // Optionally prepend a timestamp to avoid overwriting files with the same name
            $imageName = $originalName;

            // Move the image to the public directory
            $request->file('product_image')->move(public_path('images/products'), $imageName);
        }

        // Create a new product record
        Product::create([
            'product_name' => $request->input('product_name'),
            'product_title' => $request->input('product_title'),
            'product_description' => $request->input('product_description'),
            'product_type' => $request->input('product_category'),
            'product_image' => 'images/products/'.$imageName, // Store the image path
        ]);
        
        // return redirect()->back()->with('success', 'Product added successfully!');
        return response()->json(['success' => true, 'message' => 'Certificate added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::all(); // Fetch all products
        return view('admin.admin-index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function product_update_show(string $id)
    {
        $product = Product::where('id', $id)->first();

        if(!$product){
            $products = Product::all(); // Fetch all products
            return view('admin.admin-index', compact('products'));
        }
        $productTypes = ProductType::all();
        return view('admin.product-update',compact('product','productTypes'));
    }

    public function product_update(Request $request,$id){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_title' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_type' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $product = Product::find($id); 

        $existingProduct = Product::where('product_name', $request->input('product_name'))
                                ->where('id', '!=', $id)
                                ->first();

        if($existingProduct){
            return response()->json(['success' => false, 'message' => 'Product already exist.']);
        } else{
            if ($request->hasFile('product_image')) {
                // Get the original file name
                $originalName = $request->file('product_image')->getClientOriginalName();
                
                // Store the file with the original name in the 'images/spices' folder
                $imagePath = $request->file('product_image')->move('images/spices', $originalName, 'public');
            } else {
                    // If no new image, keep the existing one
                    $imagePath = $product->product_image;
            }

            // Update the product data
                $product->update([
                    'product_name' => $request->input('product_name'),
                    'product_title' => $request->input('product_title'),
                    'product_description' => $request->input('product_description'),
                    'product_type' => $request->input('product_type'),
                    'product_image' => $imagePath,
                ]);
                
                return response()->json(['success' => true, 'message' => 'Product updated successfully!']);
        }
    }
 
}
