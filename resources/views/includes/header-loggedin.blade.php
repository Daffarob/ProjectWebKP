
{{-- Navbar --}}
<nav x-data="{ open: false }" class="bg-gray-950 shadow fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

        {{-- Logo --}}
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo-samafitro.png') }}" alt="Samafitro" class="h-12 md:h-16 w-auto max-h-14">
        </div>

        {{-- Desktop Menu --}}
        <ul class="hidden md:flex flex-wrap space-x-4 lg:space-x-8 text-xs md:text-sm font-medium text-white">
            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Beranda</a></li>
            <li><a href="{{ route('produk.user') }}" class="hover:text-blue-400">Produk</a></li>
            <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
            <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
        </ul>

        {{-- Desktop Icons --}}
        <div class="hidden md:flex space-x-4 items-center">
            <button onclick="openCartModal()" class="relative">
                <img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" />
                <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center" style="display: none;">
                    0
                </span>
            </button>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                    Logout
                </button>
            </form>
        </div>

        {{-- Mobile Hamburger --}}
        <div class="md:hidden flex items-center space-x-4">
            <button onclick="openCartModal()" class="relative">
                <img src="/images/cart.png" alt="Cart" class="h-6 w-6 hover:opacity-80 transition duration-200" />
                <span id="cartCountMobile" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center" style="display: none;">
                    0
                </span>
            </button>
            <a href="{{ route('User.profile.index') }}"><img src="/images/profile.png" alt="User" class="h-6 w-6 hover:opacity-80 transition duration-200" /></a>
            
            <!-- Mobile Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                    Logout
                </button>
            </form>
            
            <button @click="open = !open" class="text-white focus:outline-none ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition
         class="md:hidden absolute top-full left-0 w-full bg-gray-950 border-t border-gray-800">
        <ul class="flex flex-col space-y-3 px-6 py-4 text-white text-sm">
            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Beranda</a></li>
            <li><a href="{{ route('produk.user') }}" class="hover:text-blue-400">Produk</a></li>
            <li><a href="{{ route('promo.index') }}" class="hover:text-blue-400">Promo</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-blue-400">Artikel & Berita</a></li>
            <li><a href="#" class="hover:text-blue-400">Hubungi Kami</a></li>
            <li class="border-t border-gray-700 pt-3">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-300 transition-colors w-full text-left">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

{{-- Tambahkan padding di awal halaman supaya konten tidak ketimpa --}}
<div class="pt-20"></div>

<!-- Global Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="cartModalLabel">
          Shopping Cart (<span id="modalCartCount">0</span> items)
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Loading State -->
        <div id="cartLoading" class="text-center py-5" style="display: none;">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="mt-2 text-muted">Loading cart...</p>
        </div>
        
        <!-- Cart Items -->
        <div id="cartItemsContainer" style="display: none;">
          <!-- Cart items will be populated here -->
        </div>
        
        <!-- Empty Cart Message -->
        <div id="emptyCartMessage" class="text-center text-muted py-5">
          <i class="fas fa-shopping-cart fa-3x mb-3 opacity-50"></i>
          <p class="mb-0">Your cart is empty</p>
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="clearCart()" class="btn btn-secondary" id="clearCartBtn">
          Clear Cart
        </button>
        <button onclick="checkout()" class="btn btn-success">
          Checkout
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Cart state
let cartItems = [];
let cartCount = 0;
let isLoading = false;

// Initialize cart when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadCart();
    
    // Listen for cart updates from other components
    window.addEventListener('cart-updated', function() {
        loadCart();
    });
});

// Load cart data
async function loadCart() {
    try {
        console.log('Loading cart...');
        isLoading = true;
        showLoading(true);
        
        const response = await fetch('/cart');
        const data = await response.json();
        
        cartItems = data.cart_items || [];
        cartCount = data.total_items || 0;
        
        console.log('Cart loaded:', { cartItems, cartCount, isLoading });
        
        updateCartDisplay();
        updateCartCount();
        
    } catch (error) {
        console.error('Error loading cart:', error);
    } finally {
        isLoading = false;
        showLoading(false);
        console.log('Loading finished, isLoading:', isLoading);
    }
}

// Update cart display
function updateCartDisplay() {
    console.log('Updating cart display, isLoading:', isLoading);
    
    const container = document.getElementById('cartItemsContainer');
    const emptyMessage = document.getElementById('emptyCartMessage');
    const modalCount = document.getElementById('modalCartCount');
    
    modalCount.textContent = cartItems.length;
    
    if (cartItems.length === 0) {
        container.style.display = 'none';
        emptyMessage.style.display = 'block';
        document.getElementById('clearCartBtn').disabled = true;
    } else {
        container.style.display = 'block';
        emptyMessage.style.display = 'none';
        document.getElementById('clearCartBtn').disabled = false;
        
        console.log('Rendering cart items...');
        
        // Render cart items
        container.innerHTML = cartItems.map(item => `
             <div class="d-flex align-items-center gap-3 py-3 border-bottom">
                 <img src="${item.product.gambar}" alt="${item.product.nama_produk}" 
                      class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                 
                 <div class="flex-grow-1 text-muted">
                     <h6 class="mb-1">${item.product.nama_produk}</h6>
                     <small class="text-muted">Quantity: ${item.quantity}</small>
                 </div>
                 
                 <div class="d-flex align-items-center gap-2 text-black">
                     <button onclick="updateCartQuantity('${item.product_id}', ${item.quantity - 1})" 
                             class="btn btn-sm btn-outline-secondary" style="width: 30px; height: 30px;">
                         -
                     </button>
                     <span class="px-2" style="min-width: 30px; text-align: center;">${item.quantity}</span>
                     <button onclick="updateCartQuantity('${item.product_id}', ${item.quantity + 1})" 
                             class="btn btn-sm btn-outline-secondary" style="width: 30px; height: 30px;">
                         +
                     </button>
                 </div>
                 
                 <button onclick="removeFromCart('${item.product_id}')" 
                         class="btn btn-sm btn-danger">
                     Remove
                 </button>
             </div>
         `).join('');
    }
}

// Update cart count display
function updateCartCount() {
    const countElements = [document.getElementById('cartCount'), document.getElementById('cartCountMobile')];
    
    countElements.forEach(element => {
        if (element) {
            if (cartCount > 0) {
                element.textContent = cartCount;
                element.style.display = 'flex';
            } else {
                element.style.display = 'none';
            }
        }
    });
}

// Show/hide loading state
function showLoading(show) {
    const loadingElement = document.getElementById('cartLoading');
    if (loadingElement) {
        loadingElement.style.display = show ? 'block' : 'none';
    }
}

// Open cart modal
function openCartModal() {
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    cartModal.show();
}

// Update cart quantity
async function updateCartQuantity(productId, newQuantity) {
    
    if (isLoading) {
        console.log('Cart is loading, operation blocked');
        return;
    }
    
    try {
        isLoading = true;
        showLoading(true);
        
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
            await loadCart();
        }
    } catch (error) {
        console.error('Error updating quantity:', error);
    } finally {
        isLoading = false;
        showLoading(false);
    }
}

// Remove from cart
async function removeFromCart(productId) {
    
    if (isLoading) {
        return;
    }
    
    try {
        isLoading = true;
        showLoading(true);
        
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
            await loadCart();
        }
    } catch (error) {
        console.error('Error removing from cart:', error);
    } finally {
        isLoading = false;
        showLoading(false);
    }
}

// Clear cart
async function clearCart() {
    if (isLoading) return;
    
    if (confirm('Are you sure you want to clear your cart?')) {
        try {
            isLoading = true;
            showLoading(true);
            
            const response = await fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            const data = await response.json();
            if (data.success) {
                await loadCart();
            }
        } catch (error) {
            console.error('Error clearing cart:', error);
        } finally {
            isLoading = false;
            showLoading(false);
        }
    }
}

// Checkout
function checkout() {
    alert('Checkout functionality will be implemented here');
}

// Make functions globally accessible for debugging
window.testCartModal = openCartModal;
window.testLoadCart = loadCart;

// Debug function to reset loading state
window.resetCartLoading = function() {
    isLoading = false;
    showLoading(false);
    console.log('Loading state reset, isLoading:', isLoading);
    updateCartDisplay();
};

// Debug function to check current state
window.checkCartState = function() {
    console.log('Current cart state:', {
        cartItems: cartItems,
        cartCount: cartCount,
        isLoading: isLoading
    });
};
</script>
