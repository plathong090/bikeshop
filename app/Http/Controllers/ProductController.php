<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Support\Facades\Validator;
use App\Models\product;
use App\Models\category;
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
        $query = $request->q; //get input from textbox
        if ($query) {
            $products = Product::where('name', 'like', '%' . $query . '%')
                ->orWhere('name', 'like', '%' . $query . '%')
                ->get(); //find product by name
        } else {
            $products = Product::all();
        }
        return view('products.index', compact('products'));
    }

    public function edit($id = null)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->prepend('เลือกรายการ', ""); //get all categories
        return view('products.edit')->with('product', $product)
            ->with('categories', $categories); //send data to view
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'price' => 'numeric',
            'stock_qty' => 'numeric',
            'category_id' => 'required|numeric',
        ];

        $messages = [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
            'code.required' => 'กรุณากรอกรหัสสินค้า',
            'numeric' => 'โปรดกรอกข้อมูลเป็นตัวเลขเท่านั้น',
            'category_id.required' => 'กรุณาเลือกหมวดหมู่สินค้า',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('product/edit/' . $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->stock_qty = $request->stock_qty;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect('product')
            ->with('ok', true)
            ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
