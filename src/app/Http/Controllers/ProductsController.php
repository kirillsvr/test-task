<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Jobs\AddNewProductJob;
use App\Mail\NewProduct;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\ProductsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsStoreRequest $request)
    {
        Products::create($request->validated());
        AddNewProductJob::dispatch($request->validated());
        return response()->json('Продукт успешно добавлен', 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \app\Models\Products  $product
     * @return \app\Http\Requests\ProductsUpdateRequest $request
     */
    public function update(ProductsUpdateRequest $request, Products $product)
    {
        $product->update($request->validated());
        return response()->json('Продукт успешно изменен', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json('Продукт успешно удален', 200);
    }
}
