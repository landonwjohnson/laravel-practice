<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('name')->get();
        return ProductResource::collection($products);
    }

    public function show($product){
        $product = Product::findOrFail($product);
        return new ProductResource($product);
    }
    
    public function store(){
        // validation goes here
        request()->validate([
            'name' => 'required|min:10|max:255',
            'price' => 'required|integer|min:100',
            'category_id' => 'required|exists:categories,id'
        ]);


        $data = request()->all();

        $product = Product::create($data);

        return new ProductResource($product);
    }

    public function update(Product $product){
        $data = request()->all();

        $product->update($data);

        return new ProductResource($product); 
    }

    public function destroy(Product $product){

        $product->delete();

        return response()->noContent();
    }
}
