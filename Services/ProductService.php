<?php

namespace App\Services;

use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use App\Models\Product;

class ProductService
{
    public function __construct()
    {
        //
    }

    public function create(StoreProductRequest $request): Product
    {
        $path = $request->image->store('public/products');

        return Product::create([
            'name' => $request->input('name'),
            'product_category_id' => $request->input('product-category-id', null),
            'description' => $request->input('description'),
            'image' => $path,
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')

        ]);
    }
    public function update(UpdateProductRequest $request, Product $product): Product
    {
         if($request->hasFile('image')) {
             $path = $request->image->store('public/products');
         }
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->image = str_replace('public', '/storage', $path);
        $product->save();

        return $product;
    }

}