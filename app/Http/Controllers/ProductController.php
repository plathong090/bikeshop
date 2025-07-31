<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->q; // รับค่าจาก input textbox name q
        if ($query) {
            $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('name', 'like', '%' . $query . '%')
            ->get(); // ค้นหาสินค้าตามชื่อ
        } else {
            $products = Product::all();
        }
        return view('products.index', compact('products'));
    }
}
