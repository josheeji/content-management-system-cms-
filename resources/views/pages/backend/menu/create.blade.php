@extends('layouts.backend.master')

@section('title', 'Create Menu')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Menu Table
            </h5>
            <a href="{{ url('/auth/menus') }}"> <button type="button" class="btn btn-success">Back
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
            <form class="form-sample" action="/auth/menus" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Menu Name<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_name" class="form-control" id="menu_name" placeholder="Menu Name"
                            value="{{ old('menu_name') }}">
                    </div>
                    @error('name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Menu Slug<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_slug" class="form-control" id="menu_slug" placeholder="Menu Slug"
                            value="{{ old('menu_slug') }}">
                    </div>
                    @error('menu_slug')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="row mb-3">
                    <label for="post_id" class="col-sm-2 col-form-label">Post<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select id="post_id" name="post_id" class="custom-select form-control">
                            <option value="">Select a Post</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $post->id }}">{{ $post->title }}

                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('post_id')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div> --}}



                <div class="row mb-3">
                    <label for="post_id" class="col-sm-2 col-form-label">Post<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select id="post_id" name="post_id" class="custom-select form-control">
                            <option value="">Select a Post</option>
                            @foreach ($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('post_id')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>



                <br>
                <h6>Status Mode</h6>
                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label for="">Status : </label>
                        <input type="checkbox" name="status">
                    </div>

                </div>
                <div class="col-md-3 mb-3">
                    <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

                </div>

                {{-- <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button> --}}

            </form>
            <!-- End Horizontal Form -->
        </div>
    </div>
@endsection
