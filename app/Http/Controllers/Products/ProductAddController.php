<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Redirect;
use App\Http\Requests\Products\ProductSaveRequest;

class ProductAddController extends Controller
{
    /**
     * Route    : productAdd
     * Url      : /admin/products/add
     */
    public function  __invoke()
    {
        return view('products.productAdd');
    }

    /**
     * Route    : productSave
     * Url      : /admin/products/save
     */
    public function save(ProductSaveRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->save();

        return Redirect::route('productIndex');

    }
}
