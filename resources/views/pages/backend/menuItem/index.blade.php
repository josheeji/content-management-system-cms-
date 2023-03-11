@extends('layouts.backend.master')
@section('title', 'Menu Table')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Menu Item Table</h5>

                <!-- Default Table -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/auth/menus/{{ $menus->id }}/menu-items/create" class="btn btn-primary btn-sm">
                        <h6>Add Menu Items</h6>
                    </a>

                    <a href="{{ url('/auth/menus') }}"> <button type="button" class="btn btn-success">Back
                        </button> </a>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="150">S. No.</th>

                                <th scope="col">Item Name</th>

                                <th scope="col"> Item Slug</th>
                                <th scope="col"> Description</th>

                                <th scope="col"> Parent</th>

                                <th class="text-center" width="200">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menuItems as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->menu_item_name }}</td>
                                    <td>{{ $item->menu_item_slug }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->menu->menu_name }}</td>


                                    <td class="text-center">
                                        <a title="Edit"
                                            href="/auth/menus/{{ $menus->id }}/menu-items/{{ $item->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>

                                        <a title="Delete"
                                            href="/auth/menus/{{ $menus->id }}/menu-items/delete/{{ $item->id }}"
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
