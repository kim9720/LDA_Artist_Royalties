<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <link rel="shortcut icon" href="{{ asset('assets/media/auth/logo.png') }}" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-52YZ3XGZJ6');
    </script>
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled d-flex flex-column h-100">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root h-100">
        <div class="page d-flex flex-row flex-column-fluid h-100">
            @include('layouts.sidenav')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div class="content d-flex flex-column flex-column-fluid mt-0">
                    @include('layouts.navigation')

                    @isset($header)
                        <header class="bg-white dark:bg-gray-800 shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <main class="flex-grow-1">
                        @yield('content')
                    </main>
                </div>

                <!-- Sticky Footer -->
                <footer class="footer py-4 d-flex flex-lg-column mt-auto" id="kt_footer">
                    <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-gray-500 fw-semibold me-1">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</span>
                            <span class="text-gray-500 fw-semibold me-1">Created by</span>
                            <a href="https://www.linkedin.com/in/mohamed-sadik-49b79120a/" target="_blank"
                               class="text-muted text-hover-primary fw-semibold me-2 fs-6">Mohamed Hababuu</a>
                        </div>

                        <div class="text-muted fw-semibold order-1">
                            <span class="text-gray-500">Version {{ config('app.version', '1.0.0') }}</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="fa fa-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/billing/general.js') }}"></script>
    <script src="{{ asset('assets/js/custom/inbox/listing.js') }}"></script>
    <script src="{{ asset('assets/js/custom/inbox/compose.js') }}"></script>
    <script src="{{ asset('assets/js/custom/inbox/reply.js') }}"></script>
</body>
</html>
