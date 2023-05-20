@extends('layouts.backend')
@section('content')


<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between"> Category List
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-primary"> Add New</a>
    </h4>
</div>
 
<div class="card-body">

    <table class="table table-sm table-hover text-center table-bordered">
        <thead>
            <th> SL </th>
            <th> Category Name</th>
            <th> status </th>
            <th> Action </th>
        </thead>
        <tbody>

        @forelse ($categories as $value)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    @if ($value->status == 1)
                        <span class="badge badge-success my-2"> Published</span>
                    @else
                        <span class="badge badge-warning my-2"> Panding</span>
                    @endif
                </td>
                <td>
                    <div class=" d-flex py-2  align-items-center">
                        <a href="{{ route('category.edit',$value->id) }}" class="btn btn-sm  btn-info">Edit</a>
                        
                        <form id="delete-form-{{ $value->id }}" action="{{ route('category.delete',$value->id) }}" method="post" class="pl-2">
                            @csrf
                            @method('DELETE')


                        </form>

                        <button type="button" onclick="sweetAlert({{ $value->id }})" class="btn btn-sm btn-danger"> Delete </button>

        
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-danger"> No data found</td>
            </tr>
            
        @endforelse



        </tbody>
    </table>


</div>

@endsection
    
                    