<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Subcategory;



class ProductsController extends Controller
{
    //this will show the products page
    public function index()
    {
        $products = Products::orderBy('id', 'asc')->get();

        return view('Products.list', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $product = new Products();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('Products.create', compact('product', 'categories', 'subcategories'));
    }


    //this will store the product in db
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'brand' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'image' => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Products.create')->withInput()->withErrors($validator);
        }

        $products = new Products();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->brand = $request->brand;
        $products->description = $request->description;
        $products->category_id = $request->category_id;
        $products->subcategory_id = $request->subcategory_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            $image->move(public_path('Uploads/Products'), $imageName);
            $products->image = $imageName;
        } else {
            $products->image = 'default.png';
        }

        $products->save();

        return redirect()->route('Products.index')->with('success', 'Product added successfully.');
    }

    //this will edit product record
    // public function edit($id)
    // {
    //     $product = Products::findOrFail($id);
    //     $categories = Category::all(); // Assuming you have a Category model
    //     $subcategories = Subcategory::all(); // Assuming you have a Subcategory model

    //     return view('Products.edit', compact('product', 'categories', 'subcategories'));
    // }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('Products.edit', compact('product', 'categories', 'subcategories'));
    }



    //this will update the product page
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'quantity' => 'required|integer',
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->quantity = $request->quantity;
        $product->brand = $request->brand;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            // Handle file upload
            $imagePath = $request->file('image')->store('Uploads/Products', 'public');
            $product->image = basename($imagePath);
        } else {
            // Maintain the existing image
            $product->image = $product->image;
        }

        
        if ($request->image != "") {

            //delete old img 
            File::delete(public_path('Uploads/Products/' . $product->image));

            //store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;  //unique name of image

            //Save img to Product directory
            $image->move(public_path('Uploads/Products'), $imageName);

            //save img name in db
            $product->image = $imageName;
            $product->save();
        }


        return redirect()->route('Products.index')->with('success', 'Product updated successfully');
    }

    //this will delete the product page
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        //delete image
        File::delete(public_path('Uploads/Products/' . $product->image));

        //delete record from db
        $product->delete();

        return redirect()->route('Products.index')->with('success', 'Product deleted successfully.');
    }
}
