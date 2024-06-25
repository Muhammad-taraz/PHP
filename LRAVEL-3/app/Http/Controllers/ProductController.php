<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories', 'tags')->get(); // Eager load categories and tags
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'categories' => 'required|array',
            'tags' => 'required|array',
        ]);

        if ($validator->fails()) {
            $categories = Category::all();
            $tags = Tag::all();
            return redirect()->back()->withErrors($validator)->withInput()->with(compact('categories', 'tags'));
        }

        $product = Product::create($request->only('name', 'price'));

        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load('categories', 'tags'); // Eager load categories and tags
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $product->load('categories', 'tags'); // Eager load categories and tags
        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'tags' => 'required|array',
            'categories' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Update product
        $product->update($request->only('name', 'price'));
    
        // Sync categories and tags
        $product->categories()->sync($request->input('categories'));
        $product->tags()->sync($request->input('tags'));
    
        // Redirect to index page with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
        
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
