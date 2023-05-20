{{-- @extends('layouts.backend')
@section('content') --}}

<x-layouts.backend>

    <div class="card-body">
        <div class="row">
            <div class="col-md-8 mx-auto">

                {{-- Alert --}}
                @include('backend.include.alert')

                <form action="{{ route('queue.store') }}" method="POST">
                @csrf
                    <div class="md-3">
                        <label for="name" class="form-label"> Name</label>
                        <input type="text" name="name" class="form-control" id="name" >

                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="email" class="form-label"> Email</label>
                        <input type="text" name="email" class="form-control" id="email" >

                        @error('email')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-primary"> Create</button>

                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layouts.backend>

{{-- @endsection --}}
