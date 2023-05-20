{{-- @extends('layouts.backend')
@section('content') --}}


<x-layouts.backend>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">Product List
            @can('product-create', Auth::User())
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary"> Add New</a>
            @endcan
        </h4>
    </div>

    <div class="card-body">

        @include('backend.include.alert')

        <x-product class="alert alert-danger" type="fw-bold"/>

        <x-brand class="alert alert-danger">
            I am web Developer
        </x-brand>

        <table class="table table-sm table-hover text-center table-bordered">
            <thead>
                <th> SL </th>
                <th> Brand </th>
                <th> Category </th>
                <th> Product Name </th>
                <th> Product Code </th>
                <th> Quantity </th>
                <th> Price </th>
                <th> Feature image </th>
                <th> Action </th>
            </thead>
            <tbody>

                @if ($products->count() > 0)
                    @foreach ($products as $key=>$product)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td> {{ $product->brand->name }} </td>
                            <td> {{ $product->category->name }} </td>
                            <td> {{ lowercase($product->product_name) }} </td>
                            <td> {{ $product->product_code }} </td>
                            <td> {{ $product->qty }} </td>
                            <td> {{ $product->price }} </td>
                            <td> <img width="80" height="80" src="{{ $product->image != null ? asset('images/products/'.$product->image)  : 'https://via.placeholder.com/80' }}"> </td>

                            <td>
                                <a href="{{ route('products.show',$product->id) }}" class="btn btn-success btn-sm">  view </a>

                                @can('product-edit', Auth::user())
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info btn-sm"> edit </a>
                                @endcan

                                <form method="POST" id="delete-form-{{ $product->id }}" class="pl-2 d-none" action="{{ route('products.destroy',$product->id) }}" >
                                    @csrf
                                    @method('DELETE')

                                </form>

                                <button type="button" onclick="sweetAlert({{ $product->id }})"  class="btn btn-danger btn-sm"> delete</button>

                            </td>

                        </tr>
                    @endforeach

                @endif



            </tbody>
        </table>


    </div>

</x-layouts.backend>

{{-- @endsection
 --}}
