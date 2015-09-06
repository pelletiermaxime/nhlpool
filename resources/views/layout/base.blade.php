<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHLPool - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
</head>
<body>
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>
    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">NHL Pool</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="/" class="pure-menu-link">Home</a></li>
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
    @yield('footer-scripts')
</body>
</html>
