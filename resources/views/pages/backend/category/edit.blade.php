@extends('layouts.backend.master')

@section('title', 'Update Category')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Category Table
            </h5>
            <a href="{{ url('/auth/categories') }}"> <button type="button" class="btn btn-success">Back
                </button> </a>
            <hr>
            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/categories/{{ $category->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="category_name" class="col-sm-2 col-form-label">Category Name<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="category_name" class="form-control" id="category_name"
                            placeholder="Menu Name" value="{{ $category->category_name }}">
                    </div>
                    @error('category_name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>


                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Slug<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Menu Name"
                            value="{{ $category->slug }}">
                    </div>
                    @error('slug')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="meta_title" class="col-sm-2 col-form-label">Meta Title<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Menu Name"
                            value="{{ $category->meta_title }}">
                    </div>
                    @error('meta_title')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="meta_description" class="col-sm-2 col-form-label">Meta Description<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_description" class="form-control" id="meta_description"
                            placeholder="Menu Name" value="{{ $category->meta_description }}">
                    </div>
                    @error('meta_description')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keyword" class="form-control" id="meta_keyword"
                            placeholder="Menu Name" value="{{ $category->meta_keyword }}">
                    </div>
                    @error('meta_keyword')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="image" placeholder="Upload Image"
                            value="{{ old('image') ?? $category->image }}">
                        <img src="/backend_assets/images/category/{{ $category->image }}" width="80px" height="80px">
                    </div>
                    @error('image')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>


                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Descrioption<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description">{{ $category->description }} </textarea>
                    </div>
                    @error('description')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>


                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status :</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Status : </label>
                        <input type="checkbox" name="status" {{$category->status == '1' ? 'checked' : ''}}/>
                    </div>

                </div>
                <div class="col-md-3 mb-3">
                    <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

                </div>

                <br>
                {{-- <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button> --}}

            </form>
            <!-- End Horizontal Form -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                style = "width: 100%; height: 500px;"

                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection
