@extends('layouts.app')

@section('title', 'Menu - Waroenk Qu')
@section('meta_description', 'Lihat menu lengkap Waroenk Qu. Berbagai pilihan makanan dan minuman dengan cita rasa autentik.')

@section('content')

<!-- Page Header -->
<div class="page-header-light">
    <h2>📋 Menu Waroenk Qu</h2>
</div>

<!-- Search & Filter -->
<section class="search-section">
    <div class="search-bar">
        <input 
            type="text" 
            class="search-input" 
            id="searchInput"
            placeholder="Cari menu favorit Anda..."
            onkeyup="searchMenu()"
        >
        <button class="search-btn">🔍</button>
    </div>
    <div class="filter-chips">
        <a href="{{ route('menu') }}" 
           class="chip {{ $category === 'Semua' ? 'active' : '' }}">
            Semua
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('menu', ['category' => $cat['name']]) }}" 
           class="chip {{ $category === $cat['name'] ? 'active' : '' }}">
            {{ $cat['icon'] }} {{ $cat['name'] }}
        </a>
        @endforeach
    </div>
</section>

<!-- Products Grid -->
<section class="products">
    <div class="product-grid" id="productGrid">
        @forelse($menus as $menu)
        <div class="product-card menu-item" 
             data-name="{{ strtolower($menu['name']) }}"
             onclick="window.location.href='{{ route('menu.detail', $menu['id']) }}'">
            <div class="product-image">
                <span style="font-size: 72px;">{{ $menu['image'] }}</span>
                @if($menu['is_popular'])
                <div class="product-badge">Populer</div>
                @endif
            </div>
            <div class="product-info">
                <h3>{{ $menu['name'] }}</h3>
                <p class="product-description">
                    {{ \Illuminate\Support\Str::limit($menu['description'], 80) }}
                </p>
                <div class="product-footer">
                    <div class="product-price">Rp {{ number_format($menu['price'], 0, ',', '.') }}</div>
                    <button class="add-btn" onclick="event.stopPropagation(); window.location.href='{{ route('menu.detail', $menu['id']) }}'">
                        Detail
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-icon">🍽️</div>
            <h3>Belum ada menu</h3>
            <p>Menu untuk kategori ini sedang dalam pengembangan</p>
        </div>
        @endforelse
    </div>
</section>

@endsection

@push('scripts')
<script>
function searchMenu() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const items = document.getElementsByClassName('menu-item');
    let hasResults = false;
    
    for (let item of items) {
        const name = item.getAttribute('data-name');
        if (name.includes(input)) {
            item.style.display = '';
            hasResults = true;
        } else {
            item.style.display = 'none';
        }
    }
    
    // Show/hide empty state
    const productGrid = document.getElementById('productGrid');
    const existingEmpty = productGrid.querySelector('.empty-state');
    
    if (!hasResults && !existingEmpty) {
        const emptyDiv = document.createElement('div');
        emptyDiv.className = 'empty-state search-empty';
        emptyDiv.innerHTML = `
            <div class="empty-icon">🔍</div>
            <h3>Menu tidak ditemukan</h3>
            <p>Coba kata kunci lain</p>
        `;
        productGrid.appendChild(emptyDiv);
    } else if (hasResults) {
        const searchEmpty = productGrid.querySelector('.search-empty');
        if (searchEmpty) searchEmpty.remove();
    }
}
</script>
@endpush
