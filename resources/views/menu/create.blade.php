@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Menu/</span> Input Menu</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        {{-- <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small> --}}
      </div>
      <div class="card-body">
        <form action="{{ route('StoreMenu') }}" method="post">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Menu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name_menu" name="name_menu" placeholder="Nasi Goreng, Mie Goreng, ....." />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Kategori Menu</label>
            <div class="col-sm-10">
              <input type="text" name="category_menu" class="form-control" id="category_menu" placeholder="Makanan, Minuman, Snack" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Rate Menu</label>
            <div class="col-sm-10">
              <input type="text" id="rate_menu" name="rate_menu" class="form-control phone-mask" placeholder="1 - 10" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Deskripsi Menu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="desc_menu" name="desc_menu" placeholder="Masukkan deskripsi menu" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Harga Menu</label>
            <div class="col-sm-10">
              <input type="int" id="price_menu" name="price_menu" class="form-control phone-mask" placeholder="Masukkan harga menu" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Kirim</button>
              <a href="{{ route('DaftarMenu') }}" class="btn btn-primary" role="button">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
