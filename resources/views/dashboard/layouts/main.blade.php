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
        <div class="min-h-75 absolute w-full bg-blue-500 dark:hidden bg-y-50 top-0 min-h-75 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')]">
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

        {{-- <div fixed-plugin>
            <a fixed-plugin-button class="z-990 rounded-circle fixed bottom-8 right-8 cursor-pointer bg-white px-4 py-2 text-xl text-slate-700 shadow-lg">
                <i class="ri-settings-3-fill pointer-events-none py-2"> </i>
            </a>
            <!-- -right-90 in loc de 0-->
            <div fixed-plugin-card class="z-sticky dark:bg-slate-850/80 shadow-3xl w-90 ease -right-90 fixed left-auto top-0 flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 backdrop-blur-2xl backdrop-saturate-200 duration-200">
                <div class="mb-0 rounded-t-2xl border-b-0 px-6 pb-0 pt-4">
                    <div class="float-left">
                        <h5 class="mb-0 mt-4 dark:text-white">Argon Configurator</h5>
                        <p class="dark:text-white dark:opacity-80">See our dashboard options.</p>
                    </div>
                    <div class="float-right mt-6">
                        <button fixed-plugin-close-button class="tracking-tight-rem bg-150 bg-x-25 active:opacity-85 mb-4 inline-block cursor-pointer rounded-lg border-0 bg-transparent p-0 text-center align-middle text-sm font-bold uppercase leading-normal text-slate-700 shadow-none transition-all ease-in hover:-translate-y-px dark:text-white">
                            <i class="ri-close-large-fill"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="mx-0 my-1 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                <div class="flex-auto overflow-auto p-6 pt-0 sm:pt-4">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0 dark:text-white">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)">
                        <div class="my-2 text-left" sidenav-colors>
                            <span class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 bg-gradient-to-tl from-blue-500 to-violet-500 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700" active-color data-color="blue" onclick="sidebarColor(this)"></span>
                            <span class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 dark:from-slate-750 dark:to-gray-850 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-zinc-800 to-zinc-700 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700 dark:bg-gradient-to-tl" data-color="gray" onclick="sidebarColor(this)"></span>
                            <span class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-blue-700 to-cyan-500 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700" data-color="cyan" onclick="sidebarColor(this)"></span>
                            <span class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-emerald-500 to-teal-400 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700" data-color="emerald" onclick="sidebarColor(this)"></span>
                            <span class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-orange-500 to-yellow-500 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700" data-color="orange" onclick="sidebarColor(this)"></span>
                            <span class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-red-600 to-orange-600 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700" data-color="red" onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-4">
                        <h6 class="mb-0 dark:text-white">Sidenav Type</h6>
                        <p class="text-sm leading-normal dark:text-white dark:opacity-80">Choose between 2 different sidenav types.
                        </p>
                    </div>
                    <div class="flex">
                        <button transparent-style-btn class="xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 dark:opacity-65 hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-2 inline-block w-full cursor-pointer rounded-lg border border-solid border-transparent bg-blue-500 bg-gradient-to-tl from-blue-500 to-violet-500 px-4 py-2.5 text-center align-middle text-sm font-bold capitalize leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px hover:border-blue-500 dark:pointer-events-none dark:cursor-not-allowed dark:border-0 dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white" data-class="bg-transparent" active-style>White</button>
                        <button white-style-btn class="xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 dark:opacity-65 hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-2 ml-2 inline-block w-full cursor-pointer rounded-lg border border-solid border-blue-500 bg-transparent bg-none px-4 py-2.5 text-center align-middle text-sm font-bold capitalize leading-normal text-blue-500 shadow-md transition-all ease-in hover:-translate-y-px hover:border-blue-500 dark:pointer-events-none dark:cursor-not-allowed dark:border-0 dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white" data-class="bg-white">Dark</button>
                    </div>
                    <p class="mt-2 block text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">You can change the
                        sidenav type just on desktop view.</p>
                    <!-- Navbar Fixed -->
                    <div class="my-4 flex">
                        <h6 class="mb-0 dark:text-white">Navbar Fixed</h6>
                        <div class="min-h-6 ml-auto block pl-0">
                            <input navbarFixed class="rounded-10 duration-250 after:rounded-circle after:duration-250 checked:after:translate-x-5.3 relative float-left ml-auto mt-1 h-5 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all ease-in-out after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:shadow-2xl after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
                        </div>
                    </div>
                    <hr class="my-6 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                    <div class="mb-12 mt-2 flex">
                        <h6 class="mb-0 dark:text-white">Light / Dark</h6>
                        <div class="min-h-6 ml-auto block pl-0">
                            <input dark-toggle class="rounded-10 duration-250 after:rounded-circle after:duration-250 checked:after:translate-x-5.3 relative float-left ml-auto mt-1 h-5 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all ease-in-out after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:shadow-2xl after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
                        </div>
                    </div>
                    <a target="_blank" class="hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 dark:from-slate-750 dark:to-gray-850 mb-4 inline-block w-full cursor-pointer rounded-lg border border-solid border-transparent bg-transparent bg-gradient-to-tl from-zinc-800 to-zinc-700 px-6 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px dark:border dark:border-solid dark:border-white dark:bg-gradient-to-tl" href="https://www.creative-tim.com/product/argon-dashboard-tailwind">Free Download</a>
                    <a target="_blank" class="active:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-4 inline-block w-full cursor-pointer rounded-lg border border-solid border-slate-700 bg-transparent px-6 py-2.5 text-center align-middle text-sm font-bold leading-normal text-slate-700 shadow-none transition-all ease-in hover:-translate-y-px hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none dark:border dark:border-solid dark:border-white dark:text-white" href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/">View
                        documentation</a>
                    <div class="w-full text-center">
                        <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard-tailwind" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                        <h6 class="mt-4 dark:text-white">Thank you for sharing!</h6>
                        <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard-tailwind" class="hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-0 me-2 mr-2 inline-block cursor-pointer rounded-lg border-0 border-slate-700 bg-slate-700 px-5 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px" target="_blank"> <i class="fab fa-twitter mr-1"></i> Tweet </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard-tailwind" class="hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-0 me-2 mr-2 inline-block cursor-pointer rounded-lg border-0 border-slate-700 bg-slate-700 px-5 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px" target="_blank"> <i class="fab fa-facebook-square mr-1"></i> Share </a>
                    </div>
                </div>
            </div>
        </div> --}}

        @include("dashboard.layouts.script")
        @yield("js")
        @vite('resources/js/app.js')
    </body>

</html>
