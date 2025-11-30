@extends('layouts.app')

@section('title', 'Menu - Waroenk Qu')
@section('meta_description', 'Lihat menu lengkap Waroenk Qu - makanan dan minuman tradisional dengan harga terjangkau')

@section('content')

<!-- Page Header -->
<section class="page-header">
    <h2>Menu <span class="highlight">Waroenk Qu</span></h2>
    <p>Nikmati berbagai pilihan menu makanan dan minuman tradisional</p>
</section>

<!-- Menu Section -->
<section class="section">
    
    <!-- Filter Tabs dengan FOTO ICON -->
    <div class="filter-tabs">
        <button class="filter-tab active" onclick="filterMenu('all')" data-filter="all">
            <img src="{{ asset('images/icon/kamera.png') }}" alt="Semua" class="tab-icon">
            Semua
        </button>
        <button class="filter-tab" onclick="filterMenu('makanan')" data-filter="makanan">
            <img src="{{ asset('images/icon/makanan.png') }}" alt="Makanan" class="tab-icon">
            Makanan
        </button>
        <button class="filter-tab" onclick="filterMenu('minuman')" data-filter="minuman">
            <img src="{{ asset('images/icon/minuman.png') }}" alt="Minuman" class="tab-icon">
            Minuman
        </button>
    </div>

    <!-- Menu Grid -->
    <div class="menu-grid">
        
        <!-- MAKANAN -->
        
        <!-- 1. Nasi Rawon -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/rawon.jpg') }}" alt="Nasi Rawon">
                <span class="menu-badge popular">Populer</span>
            </div>
            <div class="menu-content">
                <h3>Nasi Rawon</h3>
                <p class="menu-desc">Rawon legendaris dengan daging empuk yang bikin sendok ga mau berhenti. Kuah hitamnya gurih banget sampe bikin mikir, "ini resepnya dapet dari leluhur mana sih?". Paling enak dimakan pas masih hangat, sambil nambah kerupuk dan ngobrol receh sama temen.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 18.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 2. Nasi Soto Ayam -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/soto.jpg') }}" alt="Nasi Soto Ayam">
                <span class="menu-badge popular">Populer</span>
            </div>
            <div class="menu-content">
                <h3>Nasi Soto Ayam</h3>
                <p class="menu-desc">Kuah bening tapi rasanya ga bening-bening amat — gurihnya nempel di lidah! Disajikan dengan suwiran ayam, telur, sama sejumput bawang goreng biar makin wangi. Makan ini pagi-pagi, auto semangat kuliah (atau minimal semangat hidup dikit).</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 3. Nasi Soto Daging -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/soto daging.jpg') }}" alt="Nasi Soto Daging">
            </div>
            <div class="menu-content">
                <h3>Nasi Soto Daging</h3>
                <p class="menu-desc">Buat yang suka daging tapi pengen berkuah, ini jawabannya. Dagingnya empuk, kuahnya nendang, dan rasanya tuh kayak dipeluk sama aroma rempah. Dijamin abis semangkuk, pengen rebahan tapi puas banget.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 15.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 4. Nasi Lalapan Telur -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan telur.jpg') }}" alt="Nasi Lalapan Telur">
            </div>
            <div class="menu-content">
                <h3>Nasi Lalapan Telur</h3>
                <p class="menu-desc">Menu sejuta umat tapi tetep jadi andalan. Telur gorengnya mateng pas, sambalnya pedesnya manis dikit, dan lalapannya fresh banget. Cocok buat anak kos yang lagi low budget tapi pengen makan berasa "mevvah".</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 10.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 5. Nasi Lalapan Ayam -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan ayam.jpg') }}" alt="Nasi Lalapan Ayam">
            </div>
            <div class="menu-content">
                <h3>Nasi Lalapan Ayam</h3>
                <p class="menu-desc">Ayam goreng renyah di luar, juicy di dalam, sambalnya bikin keringetan tapi nagih. Kombinasi sempurna buat yang butuh energi (dan sedikit drama di lidah).</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 6. Nasi Lalapan Empal -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan-empal.jpg') }}" alt="Nasi Lalapan Empal">
            </div>
            <div class="menu-content">
                <h3>Nasi Lalapan Empal</h3>
                <p class="menu-desc">Empal dagingnya tuh manis-gurih dan lembutnya juara. Makan ini bikin ngerasa kayak lagi di rumah nenek pas Lebaran — hangat, penuh cinta, dan pasti kenyang.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 16.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 7. Nasi Lalapan Tahu Tempe -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/lalapan-tahu-tempe.jpg') }}" alt="Nasi Lalapan Tahu Tempe">
            </div>
            <div class="menu-content">
                <h3>Nasi Lalapan Tahu Tempe</h3>
                <p class="menu-desc">Menu paling humble tapi ga pernah gagal bikin bahagia. Tahu tempe goreng garing, sambalnya mantap, dan cocok banget buat yang pengen makan sehat tapi tetep hemat.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 8.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 8. Nasi Goreng Jawa -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/nasi-goreng.jpg') }}" alt="Nasi Goreng Jawa">
            </div>
            <div class="menu-content">
                <h3>Nasi Goreng Jawa</h3>
                <p class="menu-desc">Nasi goreng klasik dengan aroma bawang putih dan kecap manis yang ngangenin. Satu piring bisa ngilangin semua beban hidup (ya minimal beban perut dulu deh).</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 9. Mie Goreng Jawa -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/mie-goreng.jpg') }}" alt="Mie Goreng Jawa">
            </div>
            <div class="menu-content">
                <h3>Mie Goreng Jawa</h3>
                <p class="menu-desc">Mie lembut yang dilengkapi sayuran dan potongan bakso, dimasak pake bumbu khas rumahan. Rasanya tuh kayak "comfort food" sejati, apalagi kalo dimakan pas hujan.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 10. Kwetiau Goreng -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/kwetiau-goreng.jpg') }}" alt="Kwetiau Goreng">
            </div>
            <div class="menu-content">
                <h3>Kwetiau Goreng</h3>
                <p class="menu-desc">Kwetiau lembut tapi gak letoy, dimasak dengan sayur, bakso, dan bumbu pedas manis yang menggoda. Cocok buat yang pengen makan berat tapi tetep gaya.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 12.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 11. Telur Asin -->
        <div class="menu-card" data-category="makanan">
            <div class="menu-image">
                <img src="{{ asset('images/menu/telur-asin.jpg') }}" alt="Telur Asin">
            </div>
            <div class="menu-content">
                <h3>Telur Asin</h3>
                <p class="menu-desc">Kecil-kecil cabe rawit! Rasanya gurih banget, bikin lauk apapun langsung naik level. Sering diremehkan tapi selalu dicari pas makan rawon.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 4.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- MINUMAN -->

        <!-- 1. Kopi Panas -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/kopi-panas.jpg') }}" alt="Kopi Panas">
            </div>
            <div class="menu-content">
                <h3>Kopi Panas</h3>
                <p class="menu-desc">Kopi klasik khas warung yang bikin mata melek dan hati anget. Cocok buat nemenin obrolan serius… atau gosip ringan jam 9 malam.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 4.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 2. Kopi MIX -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/kopi-mix.jpg') }}" alt="Kopi MIX">
            </div>
            <div class="menu-content">
                <h3>Kopi MIX</h3>
                <p class="menu-desc">Perpaduan kopi dan susu yang creamy tapi tetep nyentil rasa kopinya. Kalau hidup kamu pahit, ini bisa jadi penyeimbangnya.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 4.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 3. Teh Manis Hangat/Es -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/teh-manis.jpg') }}" alt="Teh Manis">
            </div>
            <div class="menu-content">
                <h3>Teh Manis Hangat/Es</h3>
                <p class="menu-desc">Si paling aman dan selalu cocok di segala suasana. Manisnya pas, bikin tenggorokan adem dan mood naik 0,5 level.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 3.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 4. Teh Tawar Hangat/Es -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/teh-tawar.jpg') }}" alt="Teh Tawar">
            </div>
            <div class="menu-content">
                <h3>Teh Tawar Hangat/Es</h3>
                <p class="menu-desc">Buat yang lagi ngirit gula atau baru putus cinta — tanpa manis tapi tetep menenangkan.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 2.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 5. Pop Ice -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/pop-ice.jpg') }}" alt="Pop Ice">
            </div>
            <div class="menu-content">
                <h3>Pop Ice</h3>
                <p class="menu-desc">Es warna-warni rasa nostalgia. Tiap seruputannya langsung ke-throwback ke masa SD beli di kantin.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 3.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 6. Nutrisari -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/nutrisari.jpg') }}" alt="Nutrisari">
            </div>
            <div class="menu-content">
                <h3>Nutrisari</h3>
                <p class="menu-desc">Rasa jeruknya nyegerin banget, kayak dikasih semangat hidup baru tiap minum. Plus, bisa pura-pura sehat karena "ada vitaminnya".</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 3.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

        <!-- 7. Jeruk Hangat/Es -->
        <div class="menu-card" data-category="minuman">
            <div class="menu-image">
                <img src="{{ asset('images/menu/jeruk.jpg') }}" alt="Jeruk">
            </div>
            <div class="menu-content">
                <h3>Jeruk Hangat/Es</h3>
                <p class="menu-desc">Perasan jeruk asli yang segernya ga lebay, manisnya pas, asamnya nyentuh hati. Diminum pas siang bolong? auto recharge energi.</p>
                <div class="menu-footer">
                    <span class="menu-price">Rp 4.000</span>
                    <a href="#" class="btn-detail">Detail</a>
                </div>
            </div>
        </div>

    </div>

</section>

<script>
function filterMenu(category) {
    const items = document.querySelectorAll('.menu-card');
    const tabs = document.querySelectorAll('.filter-tab');
    
    tabs.forEach(tab => tab.classList.remove('active'));
    
    const activeTab = document.querySelector(`[data-filter="${category}"]`);
    if (activeTab) {
        activeTab.classList.add('active');
    }
    
    items.forEach(item => {
        if (category === 'all') {
            item.style.display = 'block';
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            }, 10);
        } else {
            if (item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 10);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        }
    });
}
</script>