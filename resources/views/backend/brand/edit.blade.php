{{-- @extends('layouts.backend')
@section('content') --}}

<x-layouts.backend>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">Update Brand
            <a href="{{ route('brand.index') }}" class="btn btn-sm btn-outline-danger"> Back</a>
        </h4>
    </div>

    <div class="card-body">

        @include('backend.include.alert')

        <form action="{{ route('brand.update',$brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="md-3">
                <label for="brand_name" class="form-label">brand Name</label>
                <input type="text" name="brand_name" value="{{ $brand->name }}" class="form-control" id="brand_name" >

                @error('brand_name')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <div class="md-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="0" {{ $brand->status== 0 ? 'selected' : '' }}>Panging</option>
                    <option value="1" {{ $brand->status== 1 ? 'selected' : '' }}>Published</option>
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

</x-layouts.backend>

{{-- @endsection --}}
