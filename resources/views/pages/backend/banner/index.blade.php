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
                    <a href="/auth/banners/create" class="btn btn-primary btn-sm"><h6>Add New banner</h6></a>
                    <hr>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="150">S. No.</th>
                                <th>Title</th>

                                <th class="text-center" width="220">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key => $banner)
                                <tr id="item-{{ $banner->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{!! $banner->title !!}</td>

                                    <td class="text-center">

                                        <a title="View Banner List" href="/auth/banners/{{ $banner->id }}/banner-items"
                                            class="btn btn-info btn-icon btn-circle"><i class="bi bi-binoculars"></i></a>
                                        <a title="Edit" href="/auth/banners/{{ $banner->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>
                                        <a title="Delete" href="javascript:void(0)" id="{{ $banner->id }}"
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
