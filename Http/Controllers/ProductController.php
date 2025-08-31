<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\View\view;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all(); // Eloquent fetch
        return view('products.index', compact('products'));
    }

    // Show the form to create a product
    public function create()
    {
        return view('products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'price'    => 'required|numeric',
            'stock'    => 'required|integer',
            'category' => 'nullable|string'
        ]);

        Product::create($request->only(['name', 'price', 'stock', 'category']));

        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    // Show the form to edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update a product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'price'    => 'required|numeric',
            'stock'    => 'required|integer',
            'category' => 'nullable|string'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'price', 'stock', 'category']));

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }

        // Display the specified customer
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('products'));
    }
}

?>