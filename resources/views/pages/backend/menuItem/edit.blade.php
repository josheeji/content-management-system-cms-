@extends('layouts.backend.master')

@section('title', 'Edit menuItem')



@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Menu Item</h5>

            <a href="{{ url('/auth/menus/' . $menu->id . '/menu-items') }}"> <button type="button"
                    class="btn btn-success">Back
                </button> </a>

            <hr>
            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/auth/menus/{{ $menu->id }}/menu-items/{{ $menuItem->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="menu_item_name" class="col-sm-2 col-form-label">Item Name<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="menu_item_name" class="form-control" id="menu_item_name"
                            placeholder="menu_item_name" value="{{ old('menu_item_name') ?? $menuItem->menu_item_name }}"
                            required>
                    </div>
                    @error('menu_item_name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    {{-- <label for="sort" class="col-sm-2 col-form-label">Sort<span class="text-danger">*</span></label> --}}
                    <div class="col-sm-10">
                        <input type="hidden" name="sort" class="form-control"
                            value="{{ old('sort') ?? $menuItem->sort }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="menu_item_slug" class="col-sm-2 col-form-label">Item Slug<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="menu_item_slug" name="menu_item_slug" class="form-control" id="menu_item_slug"
                            placeholder="menu_item_slug" value="{{ old('menu_item_slug') ?? $menuItem->menu_item_slug }}">
                    </div>
                    @error('menu_item_slug')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    {{-- <label class="col-sm-2 col-form-label">Parent<span class="text-danger">*</span></label> --}}
                    <div class="col-sm-10">
                        <input type="hidden" name="parent" class="form-control" placeholder="Parent"
                            value="{{ old('parent') ?? $menuItem->parent }}">
                        @error('parent')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="slug" class="col-sm-2 col-form-label">Description<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="description" id="mySummernote" name="description" class="form-control"
                            placeholder="description" value="{{ old('description') }}" required>
                    </div>
                    @error('description')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>


                <br>
                <hr>
                <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Update</button>

            </form>
            <!-- End Horizontal Form -->
        </div>
    </div>
@endsection
