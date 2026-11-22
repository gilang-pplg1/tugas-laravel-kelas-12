<div class="header">
  <div class="container">
    <div class="w3layouts_logo">
      <a href="{{ route('home') }}"><h1>One<span>Movies</span></h1></a>
    </div>
    <div class="w3_search">
      <form action="{{ route('movies.search') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." required="">
        <input type="submit" value="Go">
      </form>
    </div>
    <div class="w3l_sign_in_register">
      <ul>
        <li>
          @auth
            <!-- Jika SUDAH LOGIN -->
            <span style="color: #fff; margin-right: 10px; font-weight: bold;">
              @if(Auth::user()->role == 'admin' || Auth::user()->email == 'admin@gmail.com')
                👑 Admin: {{ Auth::user()->name }}
              @else
                👤 User: {{ Auth::user()->name }}
              @endif
            </span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Logout</button>
            </form>
          @else
            <!-- Jika BELUM LOGIN -->
            <a href="#" data-toggle="modal" data-target="#myModal">Login</a>
          @endauth
        </li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>

@auth
<script>
  // Paksa hapus atau sembunyikan semua tombol/link login di seluruh halaman secara total
  window.addEventListener('DOMContentLoaded', (event) => {
      // Sembunyikan lewat jQuery jika aktif
      if (typeof $ !== 'undefined') {
          $('.w3l_sign_in_register, a[data-target="#myModal"], a[href="#myModal"]').each(function() {
              // Pastikan tidak menyembunyikan form logout kita
              if (!$(this).closest('form').length) {
                  $(this).hide();
              }
          });
      }
      
      // Sembunyikan lewat Pure JavaScript untuk elemen yang tulisannya "Login" atau trigger modal
      document.querySelectorAll('a').forEach(el => {
          if ((el.innerText && el.innerText.trim().toLowerCase() === 'login') || el.getAttribute('data-target') === '#myModal') {
              if (!el.closest('form')) {
                  el.style.display = 'none';
                  el.style.visibility = 'hidden';
              }
          }
      });
  });
</script>
@endauth