@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
<style>
:root {
    --admin-primary: #2563eb;      /* blue-600 */
    --admin-primary-dark: #1e40af; /* blue-800 */
    --admin-bg-soft: #f8fafc;
}
h2.text-gray-800 {
    color: #1e293b !important;
    font-weight: 700;
}
.btn-primary {
    background-color: var(--admin-primary);
    border-color: var(--admin-primary);
}

.btn-primary:hover {
    background-color: var(--admin-primary-dark);
    border-color: var(--admin-primary-dark);
}

.btn-info {
    background-color: #0ea5e9;
    border-color: #0ea5e9;
    color: #fff;
}

.btn-warning {
    background-color: #f59e0b;
    border-color: #f59e0b;
    color: #fff;
}

.btn-danger {
    background-color: #dc2626;
    border-color: #dc2626;
}
.card {
    border-radius: 16px;
    overflow: hidden;
}

.table thead th {
    background-color: var(--admin-bg-soft);
    font-weight: 600;
    color: #334155;
    border-bottom: 1px solid #e2e8f0;
}

.table-hover tbody tr:hover {
    background-color: #f1f5f9;
}
.table img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
}
.badge.bg-success {
    background-color: #dcfce7 !important;
    color: #166534 !important;
}

.badge.bg-secondary {
    background-color: #f1f5f9 !important;
    color: #475569 !important;
}
.form-control,
.form-select {
    border-radius: 10px;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--admin-primary);
    box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .15);
}
</style>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Daftar Produk</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Produk
    </a>
</div>

{{-- Filter --}}
<form method="GET" class="row g-2 mb-4">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Cari produk..."
            value="{{ request('search') }}">
    </div>
    <div class="col-md-4">
        <select name="category" class="form-select">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category')==$category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-outline-secondary w-100">Filter</button>
    </div>
</form>

<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>
                        <img src="{{ $product->primaryImage?->image_url ?? asset('img/no-image.png') }}" class="rounded"
                            width="60">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>Rp {{ number_format($product->price) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <span class="badge bg-{{ $product->is_active ? 'success' : 'secondary' }}">
                            {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Data produk kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection