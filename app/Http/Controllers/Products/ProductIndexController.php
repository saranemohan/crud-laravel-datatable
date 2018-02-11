<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Response;

class ProductIndexController extends Controller
{
    /**
     * Route    : productIndex
     * Url      : /admin/products/
     */
    public function __invoke()
    {
        return view('products.productList');
    }
    
    public function list(Request $request)
    {

        $length     = $request->length;
        $draw       = $request->draw;
        $searchValue= $request->input('search.value');
        $columns    = $request->columns;
        $order      = $request->order;

        $product = Product::inRandomOrder();

        /**
         * Impliment sort 
         */
        switch($columns[$order[0]['column']]['data']){
            case 'name':
                $product = Product::orderBy('name', $order[0]['dir']);
                break;
            case 'code':
                $product = Product::orderBy('code', $order[0]['dir']);
                break;
        }

        /**
         * Impliment search
         */
        if(!empty($searchValue))
            $product =  $product->where('name', 'like', '%'.$searchValue.'%')
                                ->orWhere('code', 'like', '%'.$searchValue.'%');

        /**
         *  Resulting data with pagination
         */
        $data = $product->paginate($length)->toArray();

        $data['draw']           = $draw;
        $data['recordsTotal']   = $data['total'];
        $data['recordsFiltered']= $data['total'];
        $data['$searchValue']= $searchValue;

        return Response::json($data);
    }
}
