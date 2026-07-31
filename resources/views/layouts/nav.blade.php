<nav class="main-nav">
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