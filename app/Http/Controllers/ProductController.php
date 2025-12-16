<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function index()
    {
        // return Product::all();
        $products = Product::paginate(20);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->has('in_stock') ? $request->merge(['in_stock' => $request->in_stock == '1' ? true : false]) : $request->merge(['in_stock' => false]);
        $this->productValidate($request);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created');
    }



    public function update(Request $request, int $pid)
    {
        $product = Product::findOrFail($pid);
        if ($product == null) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        $request->has('in_stock') ? $request->merge(['in_stock' => $request->in_stock == '1' ? true : false]) : $request->merge(['in_stock' => false]);
        // dd($request->all());
        $this->productValidate($request);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product created');
    }

    public function destroy(int $pid)
    {
        $product = Product::findOrFail($pid);
        if ($product == null) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted');
    }

    private function productValidate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'in_stock' => 'required|boolean'
        ]);
    }
}


