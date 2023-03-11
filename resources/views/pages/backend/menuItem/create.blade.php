@extends('layouts.backend.master')

@section('title', 'Create Menu')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Menu Item Table</h5>

            <a href="{{ url('/auth/menus/' . $menu->id . '/menu-items') }}"> <button type="button" class="btn btn-success">Back
                </button> </a>

            <hr>
            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/menus/{{ $menu->id }}/menu-items" method="POST">
                @csrf
                <div class="row mb-3">
                    {{-- <label for="menu_id" class="col-sm-2 col-form-label">Menu Id<span class="text-danger">*</span></label> --}}
                    <div class="col-sm-10">
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Item Name<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_item_name" class="form-control" id="menu_item_name"
                            placeholder="menu_item_name" value="{{ old('menu_item_name') }}">
                    </div>
                    @error('menu_item_name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="sort" class="col-sm-2 col-form-label">Sort<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="number" name="sort" class="form-control" value="{{ old('sort') }}">
                    </div>
                    @error('sort')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Item Slug<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="menu_item_slug" name="menu_item_slug" class="form-control" placeholder="menu_item_slug"
                            value="{{ old('menu_item_slug') }}">
                    </div>
                    @error('menu_item_slug')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="parent" class="col-sm-2 col-form-label">Parent<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="parent" name="parent" class="form-control" placeholder="parent"
                            value="{{ old('parent') }}">
                    </div>
                    @error('parent')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>


                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Description<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="description" name="description" id="mySummernote" class="form-control" placeholder="description"
                            value="{{ old('description') }}">
                    </div>
                    @error('description')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>


                <br>
                <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

            </form><!-- End Horizontal Form -->
        </div>
    </div>
@endsection
