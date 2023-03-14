<style>
    .active {
        border: 1px solid white;
        border-radius: 8px;
    }
</style>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="/" class="logo m-0">Tour <span class="text-primary">.</span></a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li @class(['active' => request()->routeIs('index')])><a href="/">Home</a></li>
                {{-- <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                        <li><a href="/elements">Elements</a></li>
                        <li><a href="#">Menu One</a></li>
                        <li class="has-children">
                            <a href="#">Menu Two</a>
                            <ul class="dropdown">
                                <li><a href="#">Sub Menu One</a></li>
                                <li><a href="#">Sub Menu Two</a></li>
                                <li><a href="#">Sub Menu Three</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Menu Three</a></li>
                    </ul>
                </li> --}}
                <li @class(['active' => request()->routeIs('services')])>
                    <x-nav-link :href="route('services')">Services</x-nav-link>
                </li>
                <li @class(['active' => request()->routeIs('about')])>
                    <x-nav-link :href="route('about')">About</x-nav-link>
                </li>
                <li @class(['active' => request()->routeIs('contact')])>
                    <x-nav-link :href="route('contact')">Contact Us</x-nav-link>
                </li>
                @if (Auth::check())
                    <li class="has-children">
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul class="dropdown">
                            <li><a href="/elements">Elements</a></li>
                            <li><a href="/elements">Wish List</a></li>
                            <li><a href="/elements">Your Orders</a></li>
                            @if (Auth::user()->role == 'admin')
                                <li><a href="{{ route('dashboard') }}" target="_blank">Go to Dashboard</a></li>
                            @endif
                            @if (Auth::user()->role == 'owner' || Auth::user()->role == 'admin')
                                <li><a href="#">Post Your Home</a></li>
                            @endif
                            <li><a href="/logout">Sign Out</a></li>
                        </ul>
                    </li>
                @else
                    <li>
                        <x-nav-link :href="route('login')">Login</x-nav-link>
                    </li>
                @endif
            </ul>

            <a href="#"
                class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>

        </div>
    </div>
</nav>
