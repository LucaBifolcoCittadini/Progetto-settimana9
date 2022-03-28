<?php  

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\{Product, ProductCategory};
use App\Services\ProductService;


class ProductController extends Controller
{
    public function __construct(private ProductService $_productService)
    {
         //var_dump($_productCategoryService); die();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductCategory $category)
    {
        //dd(asset('storage/products/pZewumIKHdy4N7Sg0Q0LbHyvC3SpHbXRuZjfnFtA.webp'));
        return view('product.index', [
            'products' => Product::all()
        ]);
      //Product::where('product_category_id', $category->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'categories' => ProductCategory::all(),
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->_productService->create($request);

        return redirect('/products');


        //return redirect('/products');

        // $product = $this->_productService->create($request);

        // return redirect('/product');

         if ( $request->hasFile('image')) {
             $path =$request->image->store('public/products');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'products' =>Product::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->_productService->update($request, $product);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $hasError = false;

        try {
            $product->delete();
        }catch(QueryException $e) {
            $hasError = true;
        }

        return redirect('/products')->with([
            'action' => 'destroy',
            'hasError' => $hasError
        ]);

    }
}
