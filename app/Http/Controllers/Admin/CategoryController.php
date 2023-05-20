<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {          
        $category = Category::orderBy('id','DESC')->get();
        return view('backend.category.index',['categories'=>$category]);
    }

    public function create()
    {
        return view('backend.category.create');

    }

    public function store(CategoryRequest $request)
    {
        // $request->validate([
        //     'category_name' => ['required','string','min:2','max:100'],
        //     'status'        => ['required','in:0,1'],

        // ]);

        Category::create([
            'name'   => $request->category_name,
            'status' => $request->status
        ]);

        return back()->with('success','Category has been Saved.');

    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',['category'=>$category]);

    }


    public function update(CategoryRequest $request, $id)
    {
        //aigula categoryRequest a Ase
        // $request->validate([
        //     'category_name' => ['required','string','min:2','max:100'],
        //     'status'        => ['required','in:0,1'],

        // ]);

        Category::find($id)->update([
            'name'   => $request->category_name,
            'status' => $request->status
        ]);

        return back()->with('success','Category has been Updated.');
    }


    public function delete($id)
    {
        Category::find($id)->delete();
        return back()->with('success','Category has been Remove.');
    }




}
