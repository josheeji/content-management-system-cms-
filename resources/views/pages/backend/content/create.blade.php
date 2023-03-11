@extends('layouts.backend.master')

@section('title', 'Create Content')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Content Table
                <hr>
            </h5>

            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/contents" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="inputText" placeholder="Title"
                            value="{{ old('title') }}" required>
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Language</label>
                    <div class="col-sm-10">
                        <input type="text" name="language" class="form-control" id="inputText" placeholder="language"
                            value="{{ old('language') }}" required>
                    </div>
                </div> --}}
                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Short Descrioption</label>
                    <div class="col-sm-10">
                        <textarea id="short_description" name="short_description" rows="4" cols="50">{{ old('description') }}</textarea>
                    </div>
                </div> --}}

                

                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <select id="content_id" name="content_id" class="form-control" class="form-control">
                            @foreach ($contents as $content)
                                <option value="{{ $content->id }}">{{ $content->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Parent</label>
                    <div class="col-sm-10">
                        {{-- <select id="parent_id" name="parent_id" class="form-control" class="form-control"> --}}
                            <select name="parent_id" class="form-control">
                                <option value="">Parent Itself</option>                                
                            </select>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


               
                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="is_publish" class="form-control" required>
                            <option>Choose Option</option>
                            <option @selected(old('is_publish') == '1') value="1">Publish</option>
                            <option @selected(old('is_publish') == '0') value="0">Draft</option>
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Parent<span class="text-danger">*</span></label>
                    <select name="parent_id" class="col-sm-10">
                        <option value="">Parent Itself</option>
                        
                    </select>
                </div> --}}

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" value="old('image')" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" width="625">{{ old('description') }} </textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-lg">
                            <input type="checkbox" name="is_active" value="1" checked="checked">
                            <span></span>Publish ?</label>
                    </div>
                </div>

                <br>
                <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

            </form><!-- End Horizontal Form -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection
