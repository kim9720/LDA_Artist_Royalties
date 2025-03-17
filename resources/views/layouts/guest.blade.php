<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-52YZ3XGZJ6');
        </script>
        <script>
            var defaultThemeMode = "light";
            var themeMode;
            if (document.documentElement) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode") || localStorage.getItem("data-bs-theme") || defaultThemeMode;
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
        </script>
        <style>
            body {
                background-image: url('{{ asset("assets/media/auth/bg4.jpg") }}');
            }
            [data-bs-theme="dark"] body {
                background-image: url('{{ asset("assets/media/auth/bg4-dark.jpg") }}');
            }
        </style>
    </head>
    <body id="kt_body" class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
        <div>
            {{ $slot }}
        </div>
        <script>
            var hostUrl = "https://preview.keenthemes.com/metronic8/demo9/assets/";
        </script>
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
    </body>
</html>
