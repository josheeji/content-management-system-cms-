@extends('layouts.backend.master')
@section('title', 'Post Table')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Post Table
                   
                </h5>

                <!-- Default Table -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/auth/posts/create" class="btn btn-primary btn-sm">
                        <h6>Add New Post</h6>
                    </a>
                    <hr>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">S.No.</th>
                                <th scope="col">Ttitle</th>
                                <th scope="col">Banner</th>


                                {{-- <th scope="col">Sub Title</th> --}}
                                {{-- <th scope="col">Category</th> --}}
                                {{-- <th scope="col">Menu</th> --}}
                                <th scope="col">Image</th>

                                {{-- <th scope="col">Slug</th> --}}
                                {{-- <th scope="col">is_active</th> --}}
                                <th scope="col">Status</th>



                                <th scope="col" width="150">Description</th>
                                {{-- <th scope="col">Meta_keys</th> --}}
                                {{-- <th scope="col">Meta_title</th> --}}
                                {{-- <th scope="col">Meta_desc</th> --}}



                                <th class="text-center" width="220">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>

                                    <td>{{ $post->title }}</td>

                                    <td>{{ $post->banner?->title }}</td>

                                    {{-- <td>{{ $post->sub_title }}</td> --}}

                                    {{-- <td>{{ $post->slug }}</td> --}}


                                    {{-- <td>{{ $post->category->category_name }}</td> --}}



                                    {{-- <td>{{ $post->menu->menu_name }}</td> --}}


                                    {{-- <td>{{ $post->meta_keys }}</td> --}}
                                    {{-- <td>{{ $post->meta_desc }}</td> --}}
                                    <td>
                                        <img src="/backend_assets/images/posts/{{ $post->image }}" width="70px"
                                            height="70px">

                                    </td>
                                    <td> {{ $post->status == '1' ? 'Hidden' : 'Shown' }}</td>

                                    {{-- <td> {{ $post->navbar_status == 1 ? 'Hidden' : 'Shown' }}</td> --}}


                                    <td>{{ $post->description }} </td>


                                    <td class="text-center">
                                        <a title="Edit" href="/auth/posts/{{ $post->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>
                                        <a title="Delete" href="javascript:void(0)" id="{{ $post->id }}"
                                            class="btn btn-icon btn-danger btn-circle delete"><i
                                                class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    @endsection
