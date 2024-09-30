php@extends('layouts/contentNavbarLayout')

@section('title', ' List Role')
@section('page-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
@endsection
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span> List Role</h4>

    <!-- Basic Layout -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">List Role</h5>
            <a href="{{ route('roles.create') }}" class="btn btn-primary text-white">Add Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $role->role_name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <button type="button" class="dropdown-item" id="deleteButton"
                                                data-id="{{ $role->id_role }}">
                                                <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
@endsection
