<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        //return Str::limit('This is Laravel Web site','7','....');

        $products = Product::with('category','brand')->orderBy('id','desc')->get();
        return view('backend.product.index',['products'=>$products]);
    }

    public function create()
    {

        if (Gate::allows('product-create', Auth::user())) {

            // avabeo kora jabe
            // $brands = Brand::latest('id')->where('status',1)->get();
            // $categories = Category::latest('id')->where('status',1)->get();

            $data = [
                'brands'=>Brand::latest('id')->where('status',1)->get(),
                'categories'=>Category::latest('id')->where('status',1)->get()
            ];

            //return $data['categories'];
            return view('backend.product.create',['data'=>$data]);

        }else{
            return redirect()->route('products.index')->with('error','Unauthorized access denied');
        }
    }


    // product with image upload

    public function store(ProductRequest $request)
    {
        $data = $request->except('_token');
        $data['product_slug']= Str::slug($request->product_slug);

        // image upload
        // if($request->hasFile('image')){

        //     $product_file = $request->file('image');
        //     $file_extension = $product_file->getClientOriginalExtension();
        //     $product_image_name =  time().rand().'.'.$file_extension;
        //     $product_file->move('images/products/',$product_image_name);
        //     $data['image'] = $product_image_name;

        // }

        if ($request->hasFile('image')) {
            $data['image'] = $this->file_upload($request->file('image'),'images/products/');

        }


          Product::create($data);

        return back()->with('success','Product has been Saved.');

    }


    // product Delete

    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);

        $this->file_remove('images/products/',$product->image);

        $product->delete();

        return back()->with('success','Product has been remove.');
    }



    // Edit product

    public function edit($product_id)
    {
        // This method create for user don't access edit.
        if (Gate::allows('product-edit', Auth::user())) {

            $data = [
                'brands'=>Brand::latest('id')->where('status',1)->get(),
                'categories'=>Category::latest('id')->where('status',1)->get()
            ];

            $product = Product::findOrFail($product_id);

            return view('backend.product.edit',['data'=>$data,'product'=>$product]);
        }else{
            return redirect()->route('products.index')->with('error','Unauthorized access denied');
        }
    }



    // update product

    public function update(Request $request,$product_id)
    {
        $data = $request->except('_token');
        $data['product_slug']= Str::slug($request->product_slug);
        $product = Product::findOrFail($product_id);

        // image upload
        // if($request->hasFile('image')){
        //     if ($product->image != '') {
        //         file_exists('images/products/'.$product->image) ? unlink('images/products/'.$product->image) : false;
        //     }

        //     $product_file = $request->file('image');
        //     $file_extension = $product_file->getClientOriginalExtension();
        //     $product_image_name =  time().rand().'.'.$file_extension;
        //     $product_file->move('images/products/',$product_image_name);
        //     $data['image'] = $product_image_name;
        //     }else {
        //     $data['image'] = $product->image;
        // }


        if ($request->hasFile('image')) {
            $data['image'] = $this->file_update($request->file('image'),'images/products/',$product->image);

        }


          $product->update($data);

        return back()->with('success','Product has been Updated.');
    }


    // product Show

    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('backend.product.view',['product'=>$product]);
    }


}
