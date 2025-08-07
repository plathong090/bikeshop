<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('c');

        if ($keyword) {
            $categories = Category::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $categories = Category::all();
        }

        return view('categories.index', compact('categories', 'keyword'));
    }

    
    public function search(Request $request)
    {
        $textbox = $request->c;
        if ($textbox) {
            $categories = Category::where('name', 'like', '%' . $textbox . '%')
                ->orWhere('name', 'like', '%' . $textbox . '%')
                ->get(); 
        } else {
            $categories = Category::all();
        }
        return view('categories.index', compact('categories'));
    }

    public function edit($id = null)
    {
        $category = Category::find($id);

        if ($category) {
            return view('categories.edit')->with('category', $category);
        } else {
            return redirect('category')->with('error', 'ไม่พบข้อมูลประเภทสินค้าที่ต้องการแก้ไข');
        }
    }  

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $messages = [
            'name.required' => 'กรุณากรอกประเภทสินค้า',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('category/edit/' . $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::find($request->id);
        $category->name = $request->name;

        $category->save();
        return redirect('category')
            ->with('ok', true)
            ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }


    public function add()
    {
        $category = new Category();
        return view('categories.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        $messages = [
            'name.required' => 'กรุณากรอกประเภทสินค้า',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('category/add')
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return redirect('category')
            ->with('ok', true)
            ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function remove($id)
    {
        Category::find($id)->delete();
        return redirect('category')
            ->with('ok', true)
            ->with('msg', 'ลบข้อมูลสําเร็จ');
    }
}