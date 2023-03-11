@extends('layouts.backend.master')

@section('title', 'Update Post')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Post Table
            </h5>
            <a href="{{ url('/auth/posts') }}"> <button type="button" class="btn btn-success">Back
                </button> </a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <hr>
            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                            value="{{ old('title') ?? $post->title }}">
                    </div>
                    @error('title')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="sub_title" class="col-sm-2 col-form-label">Sub Title<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Sub Title"
                            value="{{ old('sub_title') ?? $post->sub_title }}">
                    </div>
                    @error('sub_title')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Slug<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug"
                            value="{{ old('slug') ?? $post->slug }}">
                    </div>
                    @error('slug')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="meta_title" class="col-sm-2 col-form-label">Meta Title<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Keys"
                            value="{{ old('meta_title') ?? $post->meta_title }}">
                    </div>
                    @error('meta_title')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="meta_keys" class="col-sm-2 col-form-label">Meta Keys<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keys" class="form-control" id="meta_keys" placeholder="Meta Keys"
                            value="{{ old('meta_keys') ?? $post->meta_keys }}">
                    </div>
                    @error('meta_keys')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="meta_desc" class="col-sm-2 col-form-label">Meta Desc<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_desc" class="form-control" id="meta_desc" placeholder="Meta Desc"
                            value="{{ old('meta_desc') ?? $post->meta_desc }}">
                    </div>
                    @error('meta_desc')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="banner_id" class="col-sm-2 col-form-label">Banner<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select id="banner_id" name="banner_id" class="custom-select form-control">
                            <option value="">Select a Banner</option>
                            @foreach ($banners as $banner)
                                <option 
                                value="{{ $banner->id }}"{{ $banner->id == $post->banner_id ? 'selected' : '' }}>
                                {{ $banner->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('banner_id')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="image"
                            placeholder="Upload Image" value="{{ old('image') ?? $post->image }}">
                        <img src="/backend_assets/images/posts/{{ $post->image }}" width="100px" height="80px">
                    </div>
                    @error('image')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label">Category<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select id="category" name="category_id"
                            class="custom-select form-control>
                            <option value="">Select a
                            category</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"{{ $category->id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div> --}}

                {{-- <div class="row mb-3">
                    <label for="menu_id" class="col-sm-2 col-form-label">Menu<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select id="menu_id" name="menu_id"
                            class="custom-select form-control>
                            <option value="">Select a menu
                            </option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}"{{ $menu->id == $menu->menu ? 'selected' : '' }}>
                                    {{ $menu->menu_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea id="mySummernote" name="description">{{ old('description') ?? $post->description }} </textarea>
                    </div>
                    @error('description')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Status : </label>
                        <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }} />
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
