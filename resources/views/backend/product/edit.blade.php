{{-- @extends('layouts.backend')
@section('content') --}}

<x-layouts.backend>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between"> Update Product
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-danger"> Back</a>
        </h4>
    </div>

    <div class="card-body">
        @include('backend.include.alert') {{-- error message shoe koranor jonno --}}

        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="md-3">
                        <label for="product_name" class="form-label">product Name</label>
                        <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control" id="product_name" >
                        @error('product_name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="product_slug" class="form-label">product Slug</label>
                        <input type="text" value="{{ $product->product_slug }}" name="product_slug" class="form-control" id="product_slug" >
                        @error('product_slug')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="product_code" class="form-label">product Code</label>
                        <input type="text" value="{{ $product->product_code }}" name="product_code" class="form-control" id="product_code" >
                        @error('product_code')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" value="{{ $product->qty }}" name="qty" class="form-control" id="quantity" >
                        @error('qty')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" value="{{ $product->price }}" name="price" class="form-control" id="price" >
                        @error('price')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="product_image" class="form-label">Feature Image</label>
                        <input type="file" name="image" class="form-control" id="product_image" >
                        @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>



                </div> <br>


                <div class="col-md-4">

                    <img class="ml-5" src="{{ $product->image != null ? asset('images/products/'.$product->image)  : 'https://via.placeholder.com/80' }}" width="250" height="150" alt="">
                    <hr>

                    <div class="md-3">
                        <label for="brand" class="form-label">Brand</label>
                        <select name="brand_id" id="brand" class="form-control">
                            <option value="">Brand Select</option>
                            @forelse ($data['brands'] as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }} >{{ $brand->name }}</option>
                            @empty

                            @endforelse
                        </select>
                        @error('brand_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Category Select</option>
                            @forelse ($data['categories'] as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @empty

                            @endforelse
                        </select>
                        @error('category_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="status" class="form-label">status</label>

                        <select name="status" id="category" class="form-control">
                            <option value="">Brand Select</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}> Pending </option>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}> Published </option>
                        </select>

                        @error('status')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>



                </div>
            </div>



            <div class="row">
                <div class="col-md-12 py-3">
                    <button type="submit" class="btn btn-info  btn-block"> Update </button>

                </div>
            </div>

        </form>

    </div>

</x-layouts.backend>

{{-- @endsection --}}
