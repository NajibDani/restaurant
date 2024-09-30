@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Menu/</span> Daftar Menu</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Borderless Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar Menu</h5>
    <a href="{{ route('CreateMenu') }}" class="btn btn-primary" role="button">Tambah Menu</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-borderless">
      <thead>
        <tr>
          <th>Id Menu</th>
          <th>Nama Menu</th>
          <th>Kategori Menu</th>
          <th>Rate Menu</th>
          <th>Deskripsi Menu</th>
          <th>Harga Menu</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($menus as $menu)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $menu->name_menu }}</td>
          <td>{{ $menu->category_menu }}</td>
          <td>{{ $menu->rate_menu }}</td>
          <td>{{ $menu->desc_menu }}</td>
          <td>{{ $menu->price_menu }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('EditMenu', ['menu' => $menu->id_menu]) }}" class="btn btn-warning btn-sm" role="button"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                <a class="dropdown-item" onclick="confirmDelete(this)"
                href="{{ route('DeleteMenu', ['menu' => $menu->id_menu]) }}"><i class="mdi mdi-trash-can-outline me-1" role="button"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--/ Borderless Table -->

</div>
@endsection
