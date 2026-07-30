
<nav class="main-nav">
   <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
      href="{{ route('home') }}"
   >
      Home
   </a>

   <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
       href="{{ route('about') }}"
   >
      About
   </a>
   
   <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" 
       href="{{ route('contact') }}"
   >
      Contact
   </a>

   @auth
   <a class="nav-link {{ request()->routeIs('crops.*') ? 'active' : '' }}" 
       href="{{ route('crops.index') }}"
   >
      作物一覧
   </a>

   <form method="POST" 
         action="{{ route('logout') }}">
      @csrf
      <button type="submit" 
              class="nav-link logout-button"
      >
         ログアウト
      </button>
   </form>
   @endauth   
</nav>