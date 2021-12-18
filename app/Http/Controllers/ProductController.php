<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->title = $request->input('title');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->save();
        return redirect()
                ->back()
                    ->with('status', "Data Added Successfully");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('product.edit', compact('products'));
    }

    public function update(Request $request,$id)
    {
        $products = Product::find($id);
        $products->title = $request->input('title');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->update();
        return redirect('products')->with('status', "Data Update Successfully");
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()
            ->back()
                ->with('status', "Data Deleted Successfully");
    }
}
