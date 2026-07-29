
<nav class="main-nav">
    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
       href="{{ route('home') }}">Home</a>
    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
       href="{{ route('about') }}">About</a>
    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" 
       href="{{ route('contact') }}">Contact</a>
    <a class="nav-link {{ request()->routeIs('crops.*') ? 'active' : '' }}" 
       href="{{ route('crops.index') }}">作物一覧</a>
</nav>