<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="light" class="scroll-smooth" :class="{ 'theme-dark': dark }" x-data="data()">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>

        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />

        @include("dashboard.layouts.link")
        @yield("css")
        @vite(["resources/css/app.css", "resources/js/app.js"])

        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>

    <body class="leading-default m-0 bg-gray-50 font-sans text-base font-normal text-slate-500 antialiased dark:bg-slate-900">
        <div class="min-h-75 absolute w-full bg-blue-500 bg-y-50 top-0 min-h-75 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] dark:bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')]">
            <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
        </div>

        @include("dashboard.layouts.sidebar")

        <main class="xl:ml-68 relative h-full max-h-screen rounded-xl transition-all duration-200 ease-in-out">
            @include("dashboard.layouts.navbar")

            <div class="mx-auto w-full px-6 py-6">
                @yield("container")
                @include("dashboard.layouts.footer")
            </div>
        </main>

        @include("dashboard.layouts.script")
        @yield("js")
        @vite('resources/js/app.js')
    </body>

</html>
