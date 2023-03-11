@extends('layouts.backend.master')
@section('title', 'Menu Table')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Menu Table

                </h5>
                <!-- Default Table -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/auth/menus/create" class="btn btn-primary btn-sm">
                        <h6>Add New Menu</h6>
                    </a>
                    <hr>

                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="150">S. No.</th>
                                <th>Name</th>
                                <th width="120">Post</th>
                                <th width="120">Status</th>

                                <th class="text-center" width="220">Action</th>
                            </tr>
                        </thead>

                        <tbody id="sortable">
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>

                                    <td>{{ $menu->menu_name }}</td>

                                    <td>{{ $menu->post?->title }}</td>


                                    <td> {{ $menu->status == '1' ? 'Hidden' : 'Shown' }}</td>
                                    {{-- <td> {{ $item->is_publish == 1 ? 'Publish' : 'Draft' }}</td> --}}


                                    <td class="text-center">
                                        <a title="View Menu List" href="/auth/menus/{{ $menu->id }}/menu-items"
                                            class="btn btn-info btn-icon btn-circle"><i class="bi bi-binoculars"></i></a>
                                        <a title="Edit" href="/auth/menus/{{ $menu->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>
                                        <a title="Delete" href="{{ url('auth/menus/' . $menu->id . '/delete') }}"
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
    @section('scripts')
        <script src="{{ asset('backend/plugins/datatables/datatables.bundle.js') }}"></script>
        <script>
            $(function() {
                $('.defaultTable').dataTable({
                    "pageLength": 50,
                    "columnDefs": [{
                        "orderable": false,
                        "targets": 3
                    }]
                });
            });
        </script>

    @endsection
