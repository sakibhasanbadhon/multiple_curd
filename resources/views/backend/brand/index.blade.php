{{-- @extends('layouts.backend')
@section('content') --}}

<x-layouts.backend>

    <x-slot name="title">
            Brand
    </x-slot>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">Brand List
            <a href="{{ route('brand.create') }}" class="btn btn-sm btn-outline-primary"> Add New</a>
        </h4>
    </div>

    <div class="card-body">

        <x-example message="Alert Message">

        </x-example>

        <table class="table table-sm table-hover text-center table-bordered">
            <thead>
                <th> SL </th>
                <th> Brand Name </th>
                <th> status </th>
                <th> Action </th>
            </thead>
            <tbody>

                @forelse ($brand_val as $value)
                    <tr>
                        <td> {{ $brand_val->firstItem()+$loop->index }} </td> {{-- $loop->index+1 --}}

                        <td> {{ $value->name }} </td>

                        <td>

                            @if ($value->status == 1)
                                <span style="color:black" class="badge badge-success"> Published</span>
                            @else
                                <span style="color:black" class="badge badge-warning"> Pending</span>
                            @endif

                        </td>

                        <td>
                            <div class="d-flex">
                                <a href=" {{ route('brand.edit',$value->id) }}" class="btn btn-info btn-sm"> edit</a>

                                <form method="POST" id="delete-form-{{ $value->id }}" class="pl-2" action="{{ route('brand.delete',$value->id) }}" >
                                    @csrf
                                    @method('DELETE')

                                </form>


                                <button type="button" onclick="sweetAlert({{ $value->id }})"  class="btn btn-danger btn-sm"> delete</button>

                            </div>

                        </td>
                    </tr>
                @empty


                @endforelse
            </tbody>

        </table>

        <div class="row align-item-center">
            <div class="col-4">  Showing to {{ $brand_val->firstItem() }} to {{ $brand_val->lastItem() }} of {{ $brand_val->total() }} results </div>
            <div class="col-8 d-flex justify-content-end"> {{ $brand_val->onEachSide(2)->links() }} </div>
        </div>

        {{-- {{ $brand_val->firstItem() }} --}}



    </div>

</x-layouts.backend>

{{-- @endsection --}}

