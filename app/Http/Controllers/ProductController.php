<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Product::orderBy('created_at', 'DESC')->get();

        $product = Product::all();
        return view('product', compact('product'));
    }

    public function showProduct($slug)
    {
        $product = Product::where('product_slug', $slug)
                ->first();

        return view("product.show", compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'product_slug'    => 'required',
            'product_image' => 'required',
        ]);

        product::create($request->all());
        return redirect('product')
        ->with('success', 'Nama Product ' . $request['name'] . ' Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    //     $product = Product::where('product_slug', $slug)
    //             ->firstOrFail();

    //     return view("product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('product_slug', $slug)
                ->first();

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_title' => 'required',
            'product_slug'    => 'required',
            'product_image' => 'required',
        ]);

        $product->update($request->all());
        return redirect('product')
        ->with('success', 'Nama Product ' . $request['product_title']. ' Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('product')
        ->with('success', 'Nama Product ' . $product['product_title'] . ' Berhasil Dihapus.');
    }
}
