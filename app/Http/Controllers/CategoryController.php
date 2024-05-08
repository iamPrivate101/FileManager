<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Termwind\render;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function create(Request $request, $id = null)
    {
        $category = new Category();

        if ($request->isMethod('post')) {
            $data = $request->all();
            $category->name = $data['name'];
            $category->description = $data['description'];
            $category->image = $data['image'];
            $category->save();
        }
        return view('category.create');
    }
}
