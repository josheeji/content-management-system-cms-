@extends('layouts.backend.master')

@section('title', 'Update Menu')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Menu Table

            </h5>
            <a href="{{ url('/auth/menus') }}"> <button type="button" class="btn btn-success">Back
                </button> </a>
            <hr>

            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/menus/{{ $menu->id }}" method="POST">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Menu Name<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_name" class="form-control" id="inputText" placeholder="menu_name"
                            value="{{ old('menu_name') ?? $menu->menu_name }}">
                    </div>
                    @error('name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Menu SLug<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_slug" class="form-control" id="inputText" placeholder="menu_slug"
                            value="{{ old('menu_slug') ?? $menu->menu_slug }}">
                    </div>
                    @error('menu_slug')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="post_id" class="col-sm-2 col-form-label">Post<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select id="post_id" name="post_id" class="custom-select form-control">
                            <option value="">Select a Post</option>
                            @foreach ($posts as $post)
                                <option 
                                {{-- value="{{ $post->id }}">{{ $post->title }} --}}
                                    value="{{ $post->id }}"{{ $post->id == $menu->post_id ? 'selected' : '' }}>
                                {{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('post_id')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <h6>Status Mode</h6>
                <br>
                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label for="">Status : </label>
                        <input type="checkbox" name="status" {{ $menu->status == '1' ? 'checked' : '' }} />
                    </div>

                </div>
                <br>
        </div>


        <br>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


        </form><!-- End Horizontal Form -->
    </div>
    </div>
@endsection
