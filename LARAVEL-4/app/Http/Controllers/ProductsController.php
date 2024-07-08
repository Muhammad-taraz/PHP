<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::orderBy('id', 'asc')->get();
        return view('Products.list', ['products' => $products]);
    }

    public function create()
    {
        $product = new Products();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('Products.create', compact('product', 'categories', 'subcategories'));
    }

    public function store(StoreProductRequest $request)
    {
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

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('Products.edit', compact('product', 'categories', 'subcategories'));
    }

    // Update the product page
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->quantity = $request->quantity;
        $product->brand = $request->brand;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            File::delete(public_path('Uploads/Products/' . $product->image));
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('Uploads/Products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();
        return redirect()->route('Products.index')->with('success', 'Product updated successfully.');
    }

    // Delete the product page
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        File::delete(public_path('Uploads/Products/' . $product->image));
        $product->delete();
        return redirect()->route('Products.index')->with('success', 'Product deleted successfully.');
    }
}
