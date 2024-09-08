@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah User')
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
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span> Tambah User</h4>

    <!-- Basic Layout -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" placeholder="Masukkan Nama" value="{{ old('name') }}" required />
                    <label for="name">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        id="phone" placeholder="Masukkan Nomor HP" value="{{ old('phone') }}" required />
                    <label for="phone">Nomor Hp</label>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" placeholder="Masukkan Email" value="{{ old('email') }}" required />
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <select class="form-select @error('id_role') is-invalid @enderror" aria-label="Default select example"
                        name="id_role" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id_role }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                    <label for="id_role">Role</label>
                    @error('id_role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-password-toggle mb-4">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group">
                        <input type="password" aria-describedby="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="" required />
                        <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-password-toggle mb-4">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" aria-describedby="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" required />
                        <span class="input-group-text cursor-pointer" id="toggleConfirmPassword">
                            <i class="mdi mdi-eye-off-outline" id="eyeIconConfirm"></i>
                        </span>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
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
