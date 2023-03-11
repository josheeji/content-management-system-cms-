@extends('layouts.backend.master')

@section('title', 'Create Banner')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Banner Table </h5>
            <a href="{{ url('/auth/banners') }}"> <button type="button" class="btn btn-success">Back
                </button> </a>
            <hr>
            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/banners" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="inputText" placeholder="Title"
                            value="{{ old('title') }}" required>
                    </div>
                    @error('title')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

            </form><!-- End Horizontal Form -->
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#short_description'))
            .then(editor => {
                style = "width: 100%; height: 500px;"

                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection --}}
