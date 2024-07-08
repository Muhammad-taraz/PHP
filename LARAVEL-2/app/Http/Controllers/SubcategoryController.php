<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'asc')->get();

        return view('subcategories.index', [
            'subcategories' => $subcategories
        ]);
    }

    public function create()
    {
        return view('subcategories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'parent_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('subcategories.create')->withInput()->withErrors($validator);
        }

        Subcategory::create($request->all());

        return redirect()->route('subcategories.index')->with('success', 'Subcategory added successfully.');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return view('subcategories.edit', [
            'subcategory' => $subcategory
        ]);
    }

    public function update($id, Request $request)
    {
        $subcategory = Subcategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'parent_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('subcategories.edit', $subcategory->id)->withInput()->withErrors($validator);
        }

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
