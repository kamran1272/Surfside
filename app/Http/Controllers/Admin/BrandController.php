<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
  
    public function index()
    {
        $brands = Brand::withCount('products')->latest()->paginate(10);
        return view('Admin.brands', compact('brands'));
    }

    public function create()
    {
        return view('Admin.add-brand');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('brands', 'public');

        Brand::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'image' => $imagePath
        ]);

        return redirect()->route('admin.brands')->with('success', 'Brand created successfully.');
    }

    
    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('Admin.edit-brand', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }
            
            $imagePath = $request->file('image')->store('brands', 'public');
            $brand->image = $imagePath;
        }

        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully.');
    }

   
    public function destroy(Brand $brand)
    {
        
        if ($brand->image && Storage::disk('public')->exists($brand->image)) {
            Storage::disk('public')->delete($brand->image);
        }
        
        $brand->delete();
        
        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully.');
    }
}