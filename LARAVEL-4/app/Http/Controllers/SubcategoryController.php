<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'asc')->get();
        return view('subcategories.index', ['subcategories' => $subcategories]);
    }

    public function create()
    {
        return view('subcategories.create');
    }

    public function store(StoreSubcategoryRequest $request)
    {
        Subcategory::create($request->all());
        return redirect()->route('subcategories.index')->with('success', 'Subcategory added successfully.');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return view('subcategories.edit', ['subcategory' => $subcategory]);
    }

    public function update(UpdateSubcategoryRequest $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());
        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
