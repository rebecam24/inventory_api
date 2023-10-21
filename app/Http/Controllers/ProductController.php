<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\ApiResponse;
use App\Http\Resources\ProductResource as ProductCollection;

class ProductController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $this->success([
            'products' => ProductCollection::collection($products),
        ],'List of products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'               => ['required','string','min:3','max:45'],
            'price'              => ['required','numeric'],
            'quantity_available' => ['required','integer'],
            'IVA'                => ['required','numeric'],
            'url_image'          => ['required','url'],
            'category_id'        => ['required','string','integer','exists:categories,id'],
            'provider_id'        => ['required','string','integer','exists:providers,id'],
        ]);

        $product = Product::create($data);

        return $this->success([
            'product'  => new ProductCollection($product),
        ],'Registered product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return $this->success([
            'product' => new ProductCollection($product),
        ],'product details');
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
        $data = $request->validate([
            'name'               => ['nullable','string','min:3','max:45'],
            'price'              => ['nullable','numeric'],
            'quantity_available' => ['nullable','integer'],
            'IVA'                => ['nullable','numeric'],
            'url_image'          => ['nullable','url'],
            'category_id'        => ['nullable','string','integer','exists:categories,id'],
            'provider_id'        => ['nullable','string','integer','exists:providers,id'],
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return $this->success([
            'product'  => new ProductCollection($product),
        ],'Updated product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return $this->success([],'Product Deleted ');
    }
}
