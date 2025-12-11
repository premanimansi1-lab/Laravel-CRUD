<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function dashboard(){
        return view('form');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:products,email',
            'date_of_birth' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile_pictures', 'public');
        }

        Product::create($data);

        // dd($data);
        return redirect()->back()->with('success', 'Product created successfully!');
    }
    public function fetch(){
        $products = Product::all();
        return view('view', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile_pictures', 'public');
        }

        $product->update($data);

        return redirect()->route('fetch')->with('success', 'Student Updated Successfully!');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete the associated image file if it exists
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Student data deleted successfully!');
    }


}
