<ul class="sidebar-nav">
    <li class="sidebar-brand">
        <a href="/">
            Henry Marbles
        </a>
    </li>
    <li>
        <a href="/">Dashboard</a>
    </li>
    
    <li class="px-3">
        <div class="dropdown-divider"></div>
    </li>
    
    @guest
        <li>
            <a href="{{ route('login') }}">Login</a>
        </li>
    @endguest

    @auth
        <li>
            <a href="{{ route('home') }}">Home</a>
        </li>

        <li>
            <a href="{{ route('logout') }}">Logout</a>
        </li>

    @endauth
</ul>