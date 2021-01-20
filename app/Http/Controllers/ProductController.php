<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $product = Product::orderBy('created_at', 'DESC')->paginate(5);
        return view('product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = ['product_title.unique' => 'The title has already been taken, please enter another one'];
        $request->validate([
            'product_title' => 'required|min:2|max:50|unique:products',
            'product_price'    => 'required|numeric',
            
        ], $messages);
        
        // product::create($request->all());
        // return redirect('product')
        // ->with('success', 'Nama Product ' . $request['product_title'] . ' Berhasil Dibuat.');


            $product = new Product;
            $product->product_title = $request->product_title;
            $product->product_slug = \Str::slug($request->product_title);
            $product->product_price = $request->product_price;
            $product->product_image = $request->product_image;
            $product->save();

        return redirect()->route('product.index')
        ->with('success', 'Nama Product ' . $product['product_title'] . ' Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::where('product_slug', $slug)->first();
        $product = Product::where('product_slug', $id)->first();

        return view("product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('product_slug', $slug)->first();
        $category = Category::all();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $messages = ['product_title.unique' => 'The title has already been taken, please enter another one'];
        $request->validate([
            'product_title' => 'required|unique:products,product_title,' . $id,
        ], $messages);
        
        // if ($request->input('product_title') == $product->product_title) { 
        //     $this->$request->validate([
        //         // 'title' => 'required|max:255',
        //         // 'image' => 'mimes:gif,bmp,jpeg,jpg,png',
        //         'product_title' => ($request->product_title != $product->product_title) ? 'unique:products,product_title' : $messages
        //     ]);
        // }    
        // $product = Product::findOrFail($id);

        $product->product_title = $request->product_title;
        $product->product_slug = \Str::slug($request->product_title);
        $product->product_price = $request->product_price;
        $product->product_image = $request->product_image;
        $product->update();


        return redirect('product')
        ->with('success', 'Nama Product ' . $request['product_title']. ' Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // DB::table('products')->truncate();
        $product->delete();
        return redirect('product')
        ->with('success', 'Nama Product ' . $product['product_title'] . ' Berhasil Dihapus.');
    } 

    public function exportXL()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');    
    }

    public function exportCSV()
    {
        return Excel::download(new ProductsExport, 'products.csv');    
    }

    public function exportPDF()
    {
        return Excel::download(new ProductsExport, 'products.pdf');    
    }

    public function upload()
    {
        return view('product.upload');
    }
    
    public function uploadData(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('file')->store('temp'));    
        return redirect()->route('product.index')
        ->with('success', 'Wadidaw! Berhasil Import Data.');
    }

}
