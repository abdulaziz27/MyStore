<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name_categories' => 'required',
        ]);

        $category = new Category;
        $category->name_categories = $request->name_categories;
        $category->slug_categories = \Str::slug($request->name_categories);
        $category->save();

        //fungsi untuk simpan ke dalam database
        // INSERT INTO siswa(nama_field) VALUES(nama_value);
        return redirect()->route('category.index')
        ->with('success', 'Category ' . $request['name_categories'] . ' Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view("category.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //validate data input 
        $request->validate([
            'name' => 'required',
        ]);
        //fungsi update database
        $category->update($request->all());
        return redirect()->route('category.index')
        ->with('success', 'Category ' . $category['name_categories']. ' Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'category ' . $category['name_categories'] . ' Berhasil Di Hapus');
    }

    }
