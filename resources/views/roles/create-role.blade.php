@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah Role')
@section('page-style')
    <style>
        .loadings {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 200;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.5);
            display: none;
            align-items: center;
            /* Vertikal */
            justify-content: center;
            /* Horizontal */
            margin: auto;
        }

        /* HTML: <div class="loader"></div> */
        .loader {
            width: 50px;
            --b: 8px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: #514b82;
            -webkit-mask:
                repeating-conic-gradient(#0000 0deg, #000 1deg 70deg, #0000 71deg 90deg),
                radial-gradient(farthest-side, #0000 calc(100% - var(--b) - 1px), #000 calc(100% - var(--b)));
            -webkit-mask-composite: destination-in;
            mask-composite: intersect;
            animation: l5 1s infinite;
        }

        @keyframes l5 {
            to {
                transform: rotate(.5turn);
            }
        }
    </style>
@endsection
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span> Tambah Role</h4>

    <!-- Basic Layout -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Role</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name"
                        id="role_name" placeholder="Admin" value="{{ old('role_name') }}" />
                    <label for="role_name">Nama Role</label>
                    @error('role_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" id="submit-button" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
    <div class="loadings">
        <div class="loader"></div>
    </div>
@endsection
@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const loadingElement = document.querySelector('.loadings');

            form.addEventListener('submit', function() {
                loadingElement.style.display = 'flex'; // Menampilkan elemen loading
            });
        });
    </script>

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
@endsection
