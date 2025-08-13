@extends('layouts.default')
@section('content')
<style>
body {
  background: radial-gradient(circle at 50% 30%, #444 0%, #222 100%);
  min-height: 100vh;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.katalog3d-header-row {
  display: flex;
  align-items: center;
  max-width: 980px;
  margin: 64px auto 18px auto;
  gap: 18px;
  position: relative;
  padding: 0 12px;
}
.katalog3d-header-row h1 {
  flex: 1;
  text-align: center;
  font-size: 2.1rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 0;
  letter-spacing: 1px;
  word-break: break-word;
}
.katalog3d-backbtn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  background: transparent;
  border: none;
  padding: 0;
  margin-left: 0;
  margin-bottom: 0;
  cursor: pointer;
}
.katalog3d-backbtn svg {
  width: 36px;
  height: 36px;
  display: block;
}
.katalog3d-backbtn:focus {
  outline: 2px solid #222;
}
.katalog3d-search {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 32px;
  width: 100%;
}
.katalog3d-search-inner {
  display: flex;
  align-items: center;
  background: #bbb;
  border-radius: 18px;
  padding: 0 12px;
  width: 340px;
  max-width: 98vw;
}
.katalog3d-search-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 22px;
  height: 22px;
  color: #666;
  margin-right: 8px;
}
.katalog3d-search-input {
  flex: 1;
  border: none;
  background: transparent;
  font-size: 1rem;
  padding: 10px 0;
  outline: none;
}
.katalog3d-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 32px;
  max-width: 980px;
  margin: 0 auto 40px auto;
  padding: 0 12px;
  width: 100%;
  box-sizing: border-box;
}
.katalog3d-card {
  background: rgba(255,255,255,0.09);
  border-radius: 18px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.10);
  text-align: center;
  padding: 24px 10px 18px 10px;
  transition: box-shadow 0.2s, transform 0.2s;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-width: 0;
  word-break: break-word;
}
.katalog3d-card:hover {
  box-shadow: 0 4px 24px rgba(0,0,0,0.18);
  transform: translateY(-4px) scale(1.03);
}
.katalog3d-card img {
  width: 140px;
  height: 90px;
  object-fit: contain;
  margin-bottom: 18px;
  background: none;
  max-width: 100%;
}
.katalog3d-card h3 {
  color: #fff;
  font-size: 1.08rem;
  font-weight: 500;
  margin: 0;
  letter-spacing: 0.5px;
  word-break: break-word;
}
@media (max-width: 1100px) {
  .katalog3d-header-row,
  .katalog3d-grid {
    max-width: 100vw;
    padding: 0 2vw;
  }
}
@media (max-width: 900px) {
  .katalog3d-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
    max-width: 98vw;
    padding: 0 2vw;
  }
  .katalog3d-card img {
    width: 100px;
    height: 60px;
  }
}
@media (max-width: 600px) {
  .katalog3d-header-row {
    margin: 32px auto 12px auto;
    gap: 10px;
    padding: 0 4vw;
    padding-top: 56px;
  }
  .katalog3d-header-row h1 {
    font-size: 1.3rem;
    text-align: center;
  }
  .katalog3d-search {
    margin-top: 48px;
  }
  .katalog3d-grid {
    margin-top: 32px;
  }
  .katalog3d-search-inner {
    width: 90vw;
    padding: 0 6px;
  }
  .katalog3d-search-input {
    font-size: 0.95rem;
  }
  .katalog3d-grid {
    grid-template-columns: 1fr;
    gap: 14px;
    margin: 0 auto 24px auto;
    padding: 0 4vw;
  }
  .katalog3d-card {
    padding: 18px 6px 14px 6px;
  }
  .katalog3d-card img {
    width: 70px;
    height: 44px;
    margin-bottom: 10px;
  }
  .katalog3d-card h3 {
    font-size: 0.98rem;
  }
}
</style>
<div class="katalog3d-header-row">
  <a href="{{ route('produk') }}" class="katalog3d-backbtn" aria-label="Kembali" title="Kembali">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M15 18l-6-6 6-6" />
    </svg>
  </a>
  <h1>Large Format Printing</h1>
</div>

<div class="katalog3d-search">
  <div class="katalog3d-search-inner">
    <span class="katalog3d-search-icon">
      <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="9" cy="9" r="7" stroke="#666" stroke-width="2" />
        <line x1="15.2" y1="15.2" x2="18" y2="18" stroke="#666" stroke-width="2" stroke-linecap="round" />
      </svg>
    </span>
    <input type="text" class="katalog3d-search-input" placeholder="Cari produk yang Anda butuhkan" />
  </div>
</div>
<div class="katalog3d-grid">
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/epson-sc-f11030.png') }}" alt="Epson SC-F11030">
    <h3>Epson SC-F11030</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/epson-sc-f9530.png') }}" alt="Epson SC-F9530">
    <h3>Epson SC-F9530</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/epson-sc-f6430.png') }}" alt="Epson SC-F6430">
    <h3>Epson SC-F6430</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/tiger600-1800ts.png') }}" alt="TIGER600-1800TS">
    <h3>TIGER600-1800TS</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/ts330-1600.png') }}" alt="TS330-1600">
    <h3>TS330-1600</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/tsi100-1600.png') }}" alt="TSI100-1600">
    <h3>TSI100-1600</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/fitro.png') }}" alt="FITRO">
    <h3>FITRO</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/kornit-presto.png') }}" alt="KORNIT Presto">
    <h3>KORNIT Presto</h3>
  </div>
  <div class="katalog3d-card">
    <img src="{{ asset('images/3dprinter/adelco-cyclone.png') }}" alt="Adelco Cyclone">
    <h3>Adelco Cyclone</h3>
  </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.querySelector('.katalog3d-search-input');
  const cards = document.querySelectorAll('.katalog3d-card');
  searchInput.addEventListener('input', function() {
    const query = searchInput.value.toLowerCase();
    cards.forEach(card => {
      const name = card.querySelector('h3').textContent.toLowerCase();
      if (name.includes(query)) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
});
</script>
