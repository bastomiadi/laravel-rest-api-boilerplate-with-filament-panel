<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Product $product, Request $request)
    {   
        return ProductResource::collection(
            $product
            ->with(['category','user'])
            ->filterByName($request->name)
            ->paginate(10)
        );
    }

    public function store(ProductRequest $request, Product $product)
    {
        return response([
            'data' => new ProductResource(
                $product::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    
    public function update(ProductRequest $request, Product $product)
    {   

        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}