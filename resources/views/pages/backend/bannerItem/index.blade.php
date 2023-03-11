@extends('layouts.backend.master')
@section('title', 'Banner Table')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Banner Table</h5>
                <!-- Default Table -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/auth/banners/{{ $banner->id }}/banner-items/create" class="btn btn-primary btn-sm">
                       <h6> Add Banner Items</h6></a>
                    <a href="{{ url('/auth/banners') }}"> <button type="button" class="btn btn-success">Back
                        </button> </a>
                    <hr>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="150">S. No.</th>
                                <th scope="col">Heading</th>

                                <th scope="col">Btn Link</th>

                                <th scope="col"> Short Discription</th>

                                <th scope="col"> Image</th>

                                <th class="text-center" width="200">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bannerItem as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->heading }}</td>
                                    <td>{{ $item->btn_link }}</td>
                                    <td>{{ $item->short_description }}</td>

                                    <td>
                                        <img src="/backend_assets/images/banners/{{ $item->image }}" width="70px"
                                            height="70px">
                                    </td>

                                    <td class="text-center">
                                        <a title="Edit"
                                            href="/auth/banners/{{ $banner->id }}/banner-items/{{ $item->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>

                                        <a title="Delete"
                                            href="/auth/banners/{{ $banner->id }}/banner-items/{{ $item->id }}/edit"
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
