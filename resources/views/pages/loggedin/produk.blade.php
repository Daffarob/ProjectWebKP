@extends('layouts.loggedin')

@section('title', 'Produk Kami | Samafitro')

@section('content')
<!-- Font Awesome untuk ikon search -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
/* ====== KATALOG HEADER & SEARCH ====== */
.katalog-header {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 30px;
}

.katalog-header h1 {
  font-size: 2.2rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 10px;
  letter-spacing: 1px;
}

.katalog-header p {
  color: #ccc;
  font-size: 1.1rem;
  margin-bottom: 20px;
}

/* Search Container */
.search-container {
  margin: 20px auto;
  max-width: 400px;
  position: relative;
  width: 100%;
  padding: 0 16px;
  box-sizing: border-box;
}

.input-with-icon {
  position: relative;
  width: 100%;
}

.input-with-icon i {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: #aaa;
  pointer-events: none;
  font-size: 1rem;
  width: 20px;
  text-align: center;
  z-index: 2;
}

.input-with-icon input {
  width: 100%;
  padding: 12px 12px 12px 36px;
  border-radius: 8px;
  border: 1px solid #444;
  background: #333;
  color: white;
  font-size: 16px;
  outline: none;
  box-sizing: border-box;
  transition: border-color 0.2s;
}

.input-with-icon input:focus {
  border-color: #555;
  background: #3a3a3a;
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
}

/* Category Tabs */
.category-tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin: 20px auto;
  max-width: 800px;
  justify-content: center;
}

.category-tab {
  padding: 10px 20px;
  border-radius: 25px;
  background: #444;
  color: #ccc;
  border: none;
  cursor: pointer;
  transition: all 0.2s;
  white-space: nowrap;
  font-size: 0.9rem;
}

.category-tab.active {
  background: #7377e3;
  color: white;
  font-weight: 500;
  box-shadow: 0 2px 6px rgba(115, 119, 227, 0.3);
}

.category-tab:hover:not(.active) {
  background: #555;
  color: white;
}

/* Product Grid */
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.product-card {
  background: rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
  text-align: center;
  padding: 20px;
  transition: box-shadow 0.2s, transform 0.2s;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.product-card:hover {
  box-shadow: 0 4px 24px rgba(0,0,0,0.18);
  transform: translateY(-4px) scale(1.02);
}

.product-card img {
  width: 200px;
  height: 120px;
  object-fit: contain;
  margin-bottom: 16px;
  background: none;
}

.product-card h3 {
  color: #fff;
  font-size: 1.1rem;
  font-weight: 500;
  margin: 0 0 12px 0;
  letter-spacing: 0.5px;
}

.specs-button {
  background: #7377e3;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-size: 0.9rem;
  cursor: pointer;
  transition: background 0.2s;
}

.specs-button:hover {
  background: #5a5fd8;
}

.add-to-cart-btn {
  background: #28a745;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-size: 0.9rem;
  cursor: pointer;
  transition: background 0.2s;
}

.add-to-cart-btn:hover {
  background: #218838;
}

/* Pagination */
.pagination-controls {
  text-align: center;
  margin: 30px 0;
  color: #ccc;
}

.pagination-controls a {
  display: inline-block;
  margin: 0 4px;
  padding: 8px 12px;
  border-radius: 6px;
  cursor: pointer;
  text-decoration: none;
  transition: background 0.2s;
}

.pagination-controls a:hover {
  background: #555;
}

.pagination-controls .active {
  background: #7377e3;
  color: white;
  font-weight: bold;
}

/* Responsive */
@media screen and (max-width: 768px) {
  .katalog-header h1 {
    font-size: 1.8rem;
  }
  
  .category-tabs {
    justify-content: start;
    overflow-x: auto;
    padding: 10px 0;
  }
  
  .product-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 16px;
    padding: 16px;
  }
  
  .product-card img {
    width: 150px;
    height: 90px;
  }
}

@media screen and (max-width: 480px) {
  .product-grid {
    grid-template-columns: 1fr;
    padding: 12px;
  }
  
  .search-container {
    padding: 0 12px;
  }
}
</style>

<div x-data="produkPage()" x-init="init()" x-cloak>
  <div class="katalog-header">
    <h1 style="margin-top: 40px;">Produk Kami</h1>
    <p>Silakan pilih kategori untuk menampilkan produk yang Anda cari</p>
    
    <!-- Search Bar -->
    <div class="search-container">
      <div class="input-with-icon">
        <i class="fas fa-search"></i>
        <input 
          type="text" 
          x-model="searchQuery" 
          placeholder="Cari produk..." 
          @input="$event.target.value = $event.target.value.replace(/[^a-zA-Z0-9\s]/g, '')"
        >
      </div>
    </div>
  </div>

  <!-- Category Tabs -->
  <div class="category-tabs">
    <button 
      class="category-tab" 
      :class="{ 'active': selectedCategory === null }"
      @click="selectedCategory = null"
    >
      Semua Kategori
    </button>
    <template x-for="cat in categories" :key="cat.id">
      <button 
        class="category-tab"
        :class="{ 'active': selectedCategory === cat.id }"
        @click="selectedCategory = cat.id"
        x-text="cat.name"
      ></button>
    </template>
  </div>

  <!-- Pagination Controls -->
  <div class="pagination-controls" x-show="totalPages > 1">
    <span x-show="currentPage > 1">
      <a @click="currentPage = 1" style="color: #888;">&laquo; First</a>
      <a @click="currentPage = currentPage - 1" style="color: #888;">&lt; Prev</a>
    </span>

    <template x-for="page in totalPages" :key="page">
      <a
        @click="currentPage = page"
        :class="{ 'active': currentPage === page }"
        x-text="page"
      ></a>
    </template>

    <span x-show="currentPage < totalPages">
      <a @click="currentPage = currentPage + 1" style="color: #888;">Next &gt;</a>
      <a @click="currentPage = totalPages" style="color: #888;">Last &raquo;</a>
    </span>
  </div>

  <!-- Product Grid -->
  <div class="product-grid">
    <template x-for="prod in paginatedProducts" :key="prod.id">
      <div class="product-card">
        <img :src="prod.gambar" :alt="prod.nama_produk" loading="lazy">
        <h3 x-text="prod.nama_produk"></h3>
        <div style="display: flex; gap: 8px; justify-content: center;">
            <button 
              class="specs-button" 
              @click="openSpecsModal(prod)"
            >
              Lihat Spesifikasi
            </button>
            <button 
              class="add-to-cart-btn" 
              @click="addToCart(prod)"
              :disabled="addingToCart === prod.id"
              :class="{ 'opacity-50 cursor-not-allowed': addingToCart === prod.id }"
            >
              <span x-show="addingToCart !== prod.id">Add to Cart</span>
              <span x-show="addingToCart === prod.id">Adding...</span>
            </button>
        </div>
      </div>
    </template>
  </div>

  <!-- No Products Message -->
  <template x-if="filteredProducts.length === 0">
    <div style="text-align: center; color: #ccc; margin: 40px 0; font-size: 1.1rem;">
      <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 16px; display: block; opacity: 0.5;"></i>
      <p>Tidak ada produk yang tersedia untuk kategori ini</p>
    </div>
  </template>
</div>



<!-- Specifications Modal -->
<div class="modal fade" id="specsModal" tabindex="-1" aria-labelledby="specsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="specsModalLabel" x-text="activeProduct?.nama_produk"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Specifications -->
        <div x-show="activeProduct && activeProduct.deskripsi">
          <ul class="list-unstyled">
            <template x-for="(item, index) in activeProduct.deskripsi" :key="index">
              <li class="d-flex justify-content-between py-2 border-bottom">
                <span class="fw-semibold" style="min-width: 150px;" x-text="item.label"></span>
                <span class="text-muted" x-text="item.value"></span>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function produkPage() {
  return {
    categories: [],
    products: [],
    selectedCategory: null,
    searchQuery: '',
    activeProduct: null,
    currentPage: 1,
    productsPerPage: 12,
    addingToCart: null,

    // Filtered products based on category and search
    get filteredProducts() {
      let result = this.products;

      if (this.selectedCategory) {
        result = result.filter(p => p.kategori_id == this.selectedCategory);
      }

      const query = this.searchQuery.trim().toLowerCase();
      if (query) {
        result = result.filter(p => {
          const namaMatch = p.nama_produk.toLowerCase().includes(query);
          
          let deskripsiMatch = false;
          if (typeof p.deskripsi === 'string') {
            deskripsiMatch = p.deskripsi.toLowerCase().includes(query);
          } else if (Array.isArray(p.deskripsi)) {
            deskripsiMatch = p.deskripsi.some(item => 
              (item.label && item.label.toLowerCase().includes(query)) || 
              (item.value && item.value.toLowerCase().includes(query))
            );
          }
          
          return namaMatch || deskripsiMatch;
        });
      }

      return result;
    },

    // Total pages for pagination
    get totalPages() {
      return Math.ceil(this.filteredProducts.length / this.productsPerPage) || 1;
    },

    // Products for current page
    get paginatedProducts() {
      const start = (this.currentPage - 1) * this.productsPerPage;
      const end = start + this.productsPerPage;
      return this.filteredProducts.slice(start, end);
    },



    // Open specifications modal
    openSpecsModal(product) {
      this.activeProduct = product;
      // Show Bootstrap modal
      const specsModal = new bootstrap.Modal(document.getElementById('specsModal'));
      specsModal.show();
    },

    // Close modal
    closeModal() {
      this.activeProduct = null;
      // Hide Bootstrap modal
      const specsModal = bootstrap.Modal.getInstance(document.getElementById('specsModal'));
      if (specsModal) {
        specsModal.hide();
      }
    },

    // Cart methods
    async addToCart(product) {
      this.addingToCart = product.id;
      try {
        const response = await fetch('/cart/add', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            product_id: product.id,
            quantity: 1
          })
        });

        const data = await response.json();
        if (data.success) {
          // Refresh cart data
          await this.loadCart();
          // Show success message
          this.showNotification(data.message, 'success');
        } else {
          this.showNotification('Failed to add product to cart', 'error');
        }
      } catch (error) {
        console.error('Error adding to cart:', error);
        this.showNotification('Failed to add product to cart', 'error');
      } finally {
        this.addingToCart = null;
      }
    },

    async loadCart() {
      try {
        const response = await fetch('/cart');
        const data = await response.json();
        this.cartItems = data.cart_items || [];
      } catch (error) {
        console.error('Error loading cart:', error);
      }
    },

    async removeFromCart(productId) {
      try {
        const response = await fetch('/cart/remove', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({ product_id: productId })
        });

        const data = await response.json();
        if (data.success) {
          await this.loadCart();
        }
      } catch (error) {
        console.error('Error removing from cart:', error);
      }
    },

    async updateQuantity(productId, newQuantity) {
      try {
        const response = await fetch('/cart/update', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            product_id: productId,
            quantity: newQuantity
          })
        });

        const data = await response.json();
        if (data.success) {
          await this.loadCart();
        }
      } catch (error) {
        console.error('Error updating quantity:', error);
      }
    },

    async clearCart() {
      if (confirm('Are you sure you want to clear your cart?')) {
        try {
          const response = await fetch('/cart/clear', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          });

          const data = await response.json();
          if (data.success) {
            await this.loadCart();
          }
        } catch (error) {
          console.error('Error clearing cart:', error);
        }
      }
    },

    checkout() {
      alert('Checkout functionality will be implemented here');
    },

    showNotification(message, type = 'info') {
      // Create notification element
      const notification = document.createElement('div');
      notification.className = `fixed top-4 right-4 z-[9999] px-6 py-3 rounded-lg text-white font-medium transition-all duration-300 transform translate-x-full`;
      
      // Set background color based on type
      if (type === 'success') {
        notification.style.background = '#28a745';
      } else if (type === 'error') {
        notification.style.background = '#dc3545';
      } else {
        notification.style.background = '#17a2b8';
      }
      
      notification.textContent = message;
      document.body.appendChild(notification);
      
      // Animate in
      setTimeout(() => {
        notification.style.transform = 'translateX(0)';
      }, 100);
      
      // Remove after 3 seconds
      setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
          document.body.removeChild(notification);
        }, 300);
      }, 3000);
    },



    // Initialize page
    async init() {
      try {
        // Ensure modal is closed on initialization
        this.activeProduct = null;
        
        // Debug: log initial state
        console.log('Initial activeProduct:', this.activeProduct);
        
        const res = await fetch('/produk/json');
        if (!res.ok) throw new Error('Gagal memuat data');
        const data = await res.json();
        this.categories = data.categories || [];
        this.products = data.products || [];

        // Debug: log loaded data
        console.log('Loaded categories:', this.categories.length);
        console.log('Loaded products:', this.products.length);

        // Reset to first page when filters change
        this.$watch('selectedCategory', () => {
          this.currentPage = 1;
        });
        
        this.$watch('searchQuery', () => {
          this.currentPage = 1;
        });
        
        // Debug: log final state
        console.log('Final activeProduct:', this.activeProduct);
        
        // Handle modal events
        const specsModal = document.getElementById('specsModal');
        if (specsModal) {
          specsModal.addEventListener('hidden.bs.modal', () => {
            this.activeProduct = null;
          });
        }
      } catch (err) {
        console.error('Error loading produk:', err);
      }
    }
  }
}
</script>
@endsection
