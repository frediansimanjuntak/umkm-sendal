<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $productImages = $product->product_images()->get();
        return view('products.product-images.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('products.product-images.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductImageRequest $request)
    {
        $product = Product::find($request->input('product_id'));
        try {
            DB::beginTransaction();
            $productImage = ProductImage::create($request->all());
            DB::commit();
            return redirect()->route('product.product-images.index', compact('product'))->withSuccess('Create Product image Success');
        } catch (\Exception $exp) {
            DB::rollback();
            return redirect()->back()->withErrors($exp->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, ProductImage $productImage)
    {
        return view('products.product-images.edit', compact('product', 'productImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductImageRequest $request, Product $product, ProductImage $productImage)
    {
        $product = Product::find($request->input('product_id'));
        try {
            DB::beginTransaction();
            $productImage->update($request->all());
            DB::commit();

            return redirect()->route('product.product-images.index', compact('product'))->withSuccess('Create Product image Success');
        } catch (\Exception $exp) {
            DB::rollback();
            return redirect()->back()->withErrors($exp->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();

            return redirect()->route('product-images.index')->withSuccess('Delete Product Image Success');
        } catch (\Exception $exp) {
            DB::rollback();
            return redirect()->route('product-images.index')->withError($exp->getMessage());
        }
    }
}
