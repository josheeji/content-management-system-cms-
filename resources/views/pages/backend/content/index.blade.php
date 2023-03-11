@extends('layouts.backend.master')
@section('title', 'Content Table')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Content Table

                </h5>
                <!-- Default Table -->
                <div class="card-body">
                    <a href="/auth/contents/create" class="btn btn-primary btn-sm">Add New Content</a>
                    <table id="myDataTable" class="table table-bordered">
                        <hr>
                        <thead>
                            <tr>
                                <th width="50">S.No.</th>
                                <th>Title</th>
                                <th>Parent</th>
                                <th width="80">Status</th>
                                <th class="text-center" width="180">Action</th>
                            </tr>
                        </thead>

                        <tbody id="sortable">
                            @foreach ($contents as $index => $item)
                                <tr id="item-{{ $item->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ !empty($item->parent_id) ? $item->getParentTitle() : 'Parent' }}</td>
                                    <td>
                                        <a title="Change Status" href="javascript:void(0)"
                                            class="btn btn-primary btn-icon btn-circle change-status"
                                            id="{{ $item->id }}">
                                            @if ($item->is_active == 1)
                                                <i class="bi bi-bag-check-fill"></i>
                                            @else
                                                <i class="bi bi-bag-dash"></i>
                                            @endif
                                        </a>
                                        @if ($item->is_active == 1)
                                            <i class="la la-check"></i>
                                        @else
                                            <i class="la la-minus"></i>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a title="Edit" href="/auth/contents/{{ $item->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>
                                        {{-- 
                                        <a title="Edit" href="/auth/contents/{{ $item->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="la la-pencil"></i></a> --}}
                                        <a title="Delete" href="javascript:void(0)" data-action="javascript:void(0)"
                                            id="{{ $item->id }}" class="btn btn-icon btn-circle btn-danger delete"><i
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
