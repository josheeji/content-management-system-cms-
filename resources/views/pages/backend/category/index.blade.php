@extends('layouts.backend.master')
@section('title', 'Category Table')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category Table
                    <hr>
                </h5>
                <!-- Default Table -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/auth/categories/create" class="btn btn-primary btn-sm">
                        <h6>Add New Category</h6>
                        
                    </a>
                    

                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="150">S. No.</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>

                                <th class="text-center" width="220">Action</th>
                            </tr>
                        </thead>

                        <tbody id="sortable">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <img src="/backend_assets/images/category/{{ $category->image }}" width="80px"
                                            height="80px">
                                    </td>
                                    <td> {{ $category->status == '1' ? 'Hidden' : 'Shown' }}</td>

                                    <td class="text-center">
                                        <a title="Edit" href="/auth/categories/{{ $category->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>
                                        <a title="Delete" href="{{ url('auth/categories/' . $category->id . '/delete') }}"
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
