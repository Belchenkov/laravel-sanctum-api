<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index(): Collection
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Product
     */
    public function store(Request $request): Product
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Models\Product
     */
    public function show(int $id): Product
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \App\Models\Product
     */
    public function update(Request $request, int $id) : Product
    {
        $product = Product::find($id);
        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy(int $id) : int
    {
        return Product::destroy($id);
    }
}
