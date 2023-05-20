<?php

namespace App\Http\Controllers\Admin;

use App\Events\BrandCreated;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;

class BrandController extends Controller
{
    /**
     *
     *  */
    public function index()
    {
        $brand = Brand::orderBy('id','DESC')->paginate(15);
        
        return view('backend.brand.index',['brand_val'=>$brand]);

    }

    public function create()
    {
        return view('backend.brand.create');

    }


    //  ============ Brand insert ========

    public function store(BrandRequest $request)
    {
        // $request->validate([
        //     'brand_name' => ['required','string','min:5','max:100'],
        //     'status'     => ['required','in:0,1'],
        // ]);


        $brand = Brand::create([
            'name'=> $request->brand_name,
            'status'=> $request->status

        ]);

        // event(new BrandCreated($brand)); //observer use korar jonno ai line comment kora holo


        return back()->with('success','Brand Has been saved.');



    }


    // ================== edit ==============

    public function edit(Brand $brand) //$id
    {
       // $brand = Brand::find($id);
        return view('backend.brand.edit',['brand'=>$brand]);

    }


    // ================== update ==============



    public function update(BrandRequest $request ,Brand $brand)
    {
        // $request->validate([
        //     'brand_name' => ['required','string','min:5','max:100'],
        //     'status'     => ['required','in:0,1'],
        // ]);


        $brand->update([
            'name'=> $request->brand_name,
            'status'=> $request->status

        ]);

        return back()->with('success','Category Has been updated.');



    }


    public function delete(Brand $brand)
    {
        //Brand::find($id)->delete();

       $brand->delete();

        return back()->with('success','Category has been Remove.');
    }


}
