@extends('layouts.backend')
@section('content')


<div class="card-header">
    <h4 class="card-title mb-0 d-flex justify-content-between">Update category
        <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-danger"> Back</a>
    </h4>
</div>

<div class="card-body">
    {{-- Alert --}}
    @include('backend.include.alert')

    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="update_id" value="{{ $category->id }}">

        <div class="md-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" name="category_name" value="{{ $category->name }}" class="form-control" id="category_name" >

            @error('category_name')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="md-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{ $category->status== 0 ? 'selected' : '' }}>Panding</option>
                <option value="1" {{ $category->status== 1 ? 'selected' : '' }}>Published</option>
            </select>

            @error('status')
                <span class="text-danger"> {{ $message }}</span>
            @enderror

        </div> <br>
        <div class="text-end">
            <button type="submit" class="btn btn-sm btn-primary"> Update </button>

        </div>
    </form>

</div>


@endsection
