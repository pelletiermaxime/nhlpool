<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHLPool - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>
    <?php
    $menuItems = [
        'Home'  => url('/'),
        'Pool'  => route('pool.index'),
    ];
    if (\Auth::user()) {
        $menuItems['Logout'] = route('user_logout');
    } else {
        $menuItems['Login'] = route('user_login');
    }
    ?>
    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">NHL Pool</a>
            <ul class="pure-menu-list">
                @foreach ($menuItems as $menuName => $menuLink)
                <li class="pure-menu-item">
                    {{-- ltrim(parse_url($menuLink, PHP_URL_PATH), '/') --}}
                    @if ($menuLink == Request::url())
                    <a href="{{ $menuLink }}" class="pure-menu-link pure-menu-selected">{{ $menuName }}</a>
                    @else
                    <a href="{{ $menuLink }}" class="pure-menu-link">{{ $menuName }}</a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>@yield('title')</h1>
            @yield('subtitle')
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
    <script src="/js/bundle.js"></script>
    @include('sweet::alert')
    @yield('footer-scripts')
</body>
</html>
