{{-- @extends('layouts.backend')
@section('content') --}}


<x-layouts.backend>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between"> View Product
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-danger"> Back</a>
        </h4>
    </div>


    <div class="card-body">

        <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th> Product Brand </th>
                <td>{{ $product->brand->name }}</td>
            </tr>
            <tr>
                <th>Product Category</th>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>{{ $product->product_name }}</td>
            </tr>

            <tr>
                <th>Product Slug</th>
                <td>{{ $product->product_slug }}</td>
            </tr>
            <tr>
                <th>Product Code</th>
                <td>{{ $product->product_code }}</td>
            </tr>
            <tr>
                <th>Product Quantity</th>
                <td>{{ $product->qty }}</td>
            </tr>
            <tr>
                <th>Product Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Product status</th>
                <td>
                    @if ($product->status == 1)
                        <span class="badge p-1 bg-success">Published</span>
                    @else
                        <span class="badge p-1 bg-warning">Pending</span>
                    @endif

                </td>
            </tr>
            <tr>
                <th>Feture Image</th>
                <td><img class="ml-5" src="{{ $product->image != null ? asset('images/products/'.$product->image)  : 'https://via.placeholder.com/80' }}" width="150" height="110" alt="">
                </td>
            </tr>

        </thead>
        </table>



    </div>



</x-layouts.backend>

{{-- @endsection --}}
