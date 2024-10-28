@extends('layouts/contentNavbarLayout')

@section('title', 'Horizontal Layouts - Forms')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Menu/</span> Daftar Menu</h4>

<!-- Filter Category dan Tambah Menu -->
<div class="d-flex justify-content-between mb-4">
  <div>
    <form method="GET" action="{{ route('DaftarMenu') }}">
      <label for="filterCategory" class="form-label">Filter Kategori</label>
      <select name="category" id="filterCategory" class="form-select" onchange="this.form.submit()">
        <option value="">Semua Kategori</option>
        <option value="Makanan" {{ request('category') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
        <option value="Minuman" {{ request('category') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
        <option value="Snack" {{ request('category') == 'Snack' ? 'selected' : '' }}>Snack</option>
      </select>
    </form>
  </div>
  <div>
    <a href="{{ route('CreateMenu') }}" class="btn btn-primary" role="button">Tambah Menu</a>
  </div>
</div>

<!-- Card Layout for Menu -->
<div class="row mb-4">
  @foreach ($menus as $menu)
    @if (!request('category') || request('category') == $menu->category_menu)
      <div class="col-md-6 col-lg-3 mb-2">
        <div class="card text-center mb-2 card-hover p-1">
          <div class="card-body d-flex flex-column p-2">
            <!-- Title and Category -->
            <h6 class="card-title mb-0">{{ $menu->name_menu }}</h6>
            <p class="card-subtitle text-muted mb-1 small">{{ $menu->category_menu }}</p>
            
            <!-- Description -->
            <p class="card-text description small mb-2">{{ $menu->desc_menu }}</p>
            
            <!-- Price and Rating -->
            <p class="card-text mb-1 small"><strong>Harga:</strong> Rp{{ number_format($menu->price_menu, 0, ',', '.') }}</p>
            <p class="card-text mb-1 small"><strong>Rating:</strong> {{ $menu->rate_menu }}/10</p>
            
            <!-- Action Buttons -->
            <div class="d-flex justify-content-between mt-1">
              <a href="{{ route('EditMenu', ['menu' => $menu->id_menu]) }}" class="btn btn-warning btn-sm px-2">Edit</a>
              <a href="{{ route('DeleteMenu', ['menu' => $menu->id_menu]) }}" class="btn btn-danger btn-sm px-2" onclick="confirmDelete(this)">Delete</a>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
</div>

@endsection

@push('styles')
<!-- Custom CSS -->
<style>
  .card-hover {
    transition: transform 0.2s ease-in-out;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .description {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Limit to 2 lines */
    -webkit-box-orient: vertical;
    transition: max-height 0.3s ease;
  }
  .card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .card-text {
    margin-bottom: 0.5rem;
  }

  .card-title {
    font-size: 1.25rem;
    font-weight: bold;
  }

  .card-subtitle {
    font-size: 1rem;
    color: #6c757d;
  }


</style>
@endpush

