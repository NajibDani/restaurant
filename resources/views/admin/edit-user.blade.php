@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

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

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#formAccountSettings');
            const loadingElement = document.querySelector('.loadings');

            form.addEventListener('submit', function() {
                loadingElement.style.display = 'flex'; // Menampilkan elemen loading
            });
            const checkbox = document.getElementById('accountActivation');
            const button = document.getElementById('deactivateButton');

            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    button.disabled = false; // Aktifkan tombol jika checkbox dicentang
                } else {
                    button.disabled = true; // Nonaktifkan tombol jika checkbox tidak dicentang
                }
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

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Account
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header">Profile Details</h4>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route('user.update', $user->id_user) }}">
                        @csrf
                        @method('PUT')
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="name" name="name" value="{{ $user->name }}" autofocus required />
                                    <label for="name">Name</label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                        name="phone" id="phone" value="{{ $user->phone }}" required />
                                    <label for="phone">Phone</label>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        id="email" name="email" value="{{ $user->email }}" required
                                        placeholder="john.doe@example.com" />
                                    <label for="email">E-mail</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="id_role" name="id_role"
                                        class="select2 form-select @error('id_role') is-invalid @enderror" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id_role }}"
                                                {{ $user->id_role == $role->id_role ? 'selected' : '' }}>
                                                {{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="id_role">role</label>
                                    @error('id_role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header fw-normal">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" method="POST" action="{{ route('user.destroy', $user->id_user) }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-check mb-3 ms-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                        </div>
                        <button type="submit" id="deactivateButton" class="btn btn-danger" disabled>Deactivate
                            Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="loadings">
        <div class="loader"></div>
    </div>
@endsection
