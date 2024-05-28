<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('products.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($request->all());
            DB::commit();
            return redirect()->route('products.index')->withSuccess('Create Product Success');
        } catch (\Exception $exp) {
            DB::rollback();
            return redirect()->back()->withErrors($exp->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        return view('products.edit', compact('product', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
            $product->update($request->all());
            DB::commit();

            return redirect()->route('products.index')->withSuccess('Update Product Success');
        } catch (\Exception $exp) {
            DB::rollback();
            return redirect()->back()->withErrors($exp->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();

            return redirect()->route('products.index')->withSuccess('Delete Product Success');
        } catch (\Exception $exp) {
            DB::rollback();
            return redirect()->route('products.index')->withError($exp->getMessage());
        }
    }
}
