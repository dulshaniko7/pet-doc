<!DOCTYPE html>
<html>
<head>
    @include("includes.head")
    @yield('styles')
</head>
<body id="page-top">
    <div id="app">

        <div id="preloader">
            <div class="spinner">
                <div class="bounce1"></div>
            </div>
        </div>

        @include("includes.nav")

        @yield('content')
    </div>

    @include("includes.footer")

    @include("includes.tail")
</body>
</html>
