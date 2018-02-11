<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Redirect;
use App\Http\Requests\Products\ProductSaveRequest;

class ProductChangeController extends Controller
{
    /**
     * Route    : productChange
     * Url      : /admin/products/change/{id?}
     */
    public function __invoke($id)
    {
        $product = Product::find($id);
        if(!empty($product)){
            return view('products.productChange',['product'=>$product,'id'=>$id]);
        }
        return Redirect::to(route('productIndex'));
    }

    /**
     * Route    : productUpdate
     * Url      : /admin/products/update/{id?}
     */
    public function update(ProductSaveRequest $request,$id)
    {

        $product = Product::find($id);
        if(!empty($product)){
            $product->name = $request->name;
            $product->code = $request->code;
            $product->save();
        }
        return Redirect::route('productIndex');
        
    }

     /**
     * Route    : productDelete
     * Url      : /admin/products/delete/{id?}
     */
    public function delete($id)
    {
        Product::destroy($id);
        return Redirect::route('productIndex');
    }
}
