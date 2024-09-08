@extends('layouts/contentNavbarLayout')

@section('title', ' List User')
@section('page-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
@endsection
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span> List User</h4>

    <!-- Basic Layout -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">List User</h5>
            <a href="{{ route('users.create') }}" class="btn btn-primary text-white">Add user</a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->role_name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('user.edit', $user->id_user) }}"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <button type="button" class="dropdown-item" id="deleteButton"
                                                data-id="{{ $user->id_user }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let table = new DataTable('#myTable');
        document.addEventListener('DOMContentLoaded', function() {
            // Pilih semua tombol hapus dengan kelas `deleteButton`
            const deleteButtons = document.querySelectorAll('#deleteButton');

            deleteButtons.forEach((button) => {
                button.addEventListener('click', function(event) {
                    const id = button.getAttribute('data-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Membuat elemen form untuk mengirim permintaan DELETE
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/delete-user/${id}`;
                            form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
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
