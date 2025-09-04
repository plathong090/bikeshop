<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductControllerApi extends Controller
{
    public function product_list($category_id = null)
    {
        $query = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $products = $query->get();

        return response()->json([
            'ok' => true,
            'products' => $products
        ]);
    }

    public function product_search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $products = Product::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $products = Product::all();
        }

        return response()->json(array(
            'ok' => true,
            'products' => $products,
        ));
    }
}
