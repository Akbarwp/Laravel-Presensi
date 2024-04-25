<nav class="duration-250 relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all ease-in lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
    <div class="flex-wrap-inherit mx-auto flex w-full items-center justify-between px-4 py-1">
        <nav>
            <!-- breadcrumb -->
            <ol class="mr-12 flex flex-wrap rounded-lg bg-transparent pt-1 sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Pages</a>
                </li>
                <li class="pl-2 text-sm capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize text-white">{{ $title }}</h6>
        </nav>

        <div class="mt-2 flex grow items-center sm:mr-6 sm:mt-0 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="ease relative flex w-full flex-wrap items-stretch rounded-lg transition-all">
                    <span class="ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-br-none rounded-tr-none border border-r-0 border-transparent bg-transparent px-2.5 py-2 text-center text-sm font-normal text-slate-500 transition-all">
                        <i class="ri-search-line"></i>
                    </span>
                    <input type="text" class="focus:shadow-primary-outline ease w-1/100 leading-5.6 dark:bg-slate-850 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pl-9 pr-3 text-sm text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow dark:text-white" placeholder="Type here..." />
                </div>
            </div>
            <ul class="md-max:w-full mb-0 flex list-none flex-row justify-end pl-0">
                {{-- Dark mode switcher --}}
                <li class="flex items-center">
                    {{-- <input dark-toggle class="rounded-10 duration-250 after:rounded-circle after:duration-250 checked:after:translate-x-5.3 relative float-left ml-auto mt-1 h-5 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all ease-in-out after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:shadow-2xl after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" /> --}}
                    <button class="focus:shadow-outline-purple h-8 w-8 rounded-full focus:outline-none" @click="toggleTheme" aria-label="Toggle color mode">
                        <template x-if="!dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto text-yellow-300" width="20" height="20" viewBox="0 0 24 24">
                                <rect x="0" y="0" width="24" height="24" fill="rgba(255, 255, 255, 0)" />
                                <g fill="none" stroke="currentColor" stroke-dasharray="2" stroke-dashoffset="2" stroke-linecap="round" stroke-width="2">
                                    <path d="M0 0">
                                        <animate fill="freeze" attributeName="d" begin="1.2s" dur="0.2s" values="M12 19v1M19 12h1M12 5v-1M5 12h-1;M12 21v1M21 12h1M12 3v-1M3 12h-1" />
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="1.2s" dur="0.2s" values="2;0" />
                                    </path>
                                    <path d="M0 0">
                                        <animate fill="freeze" attributeName="d" begin="1.5s" dur="0.2s" values="M17 17l0.5 0.5M17 7l0.5 -0.5M7 7l-0.5 -0.5M7 17l-0.5 0.5;M18.5 18.5l0.5 0.5M18.5 5.5l0.5 -0.5M5.5 5.5l-0.5 -0.5M5.5 18.5l-0.5 0.5" />
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="1.5s" dur="1.2s" values="2;0" />
                                    </path>
                                    <animateTransform attributeName="transform" dur="30s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12" />
                                </g>
                                <g fill="currentColor">
                                    <path d="M15.22 6.03L17.75 4.09L14.56 4L13.5 1L12.44 4L9.25 4.09L11.78 6.03L10.87 9.09L13.5 7.28L16.13 9.09L15.22 6.03Z">
                                        <animate fill="freeze" attributeName="fill-opacity" dur="0.4s" values="1;0" />
                                    </path>
                                    <path d="M19.61 12.25L21.25 11L19.19 10.95L18.5 9L17.81 10.95L15.75 11L17.39 12.25L16.8 14.23L18.5 13.06L20.2 14.23L19.61 12.25Z">
                                        <animate fill="freeze" attributeName="fill-opacity" begin="0.2s" dur="0.4s" values="1;0" />
                                    </path>
                                </g>
                                <g fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M7 6 C7 12.08 11.92 17 18 17 C18.53 17 19.05 16.96 19.56 16.89 C17.95 19.36 15.17 21 12 21 C7.03 21 3 16.97 3 12 C3 8.83 4.64 6.05 7.11 4.44 C7.04 4.95 7 5.47 7 6 Z" />
                                    <set attributeName="opacity" begin="0.6s" to="0" />
                                </g>
                                <mask id="lineMdMoonFilledToSunnyFilledLoopTransition0">
                                    <circle cx="12" cy="12" r="12" fill="#fff" />
                                    <circle cx="18" cy="6" r="12" fill="#fff">
                                        <animate fill="freeze" attributeName="cx" begin="0.6s" dur="0.4s" values="18;22" />
                                        <animate fill="freeze" attributeName="cy" begin="0.6s" dur="0.4s" values="6;2" />
                                        <animate fill="freeze" attributeName="r" begin="0.6s" dur="0.4s" values="12;3" />
                                    </circle>
                                    <circle cx="18" cy="6" r="10">
                                        <animate fill="freeze" attributeName="cx" begin="0.6s" dur="0.4s" values="18;22" />
                                        <animate fill="freeze" attributeName="cy" begin="0.6s" dur="0.4s" values="6;2" />
                                        <animate fill="freeze" attributeName="r" begin="0.6s" dur="0.4s" values="10;1" />
                                    </circle>
                                </mask>
                                <circle cx="12" cy="12" r="10" fill="currentColor" mask="url(#lineMdMoonFilledToSunnyFilledLoopTransition0)" opacity="0">
                                    <set attributeName="opacity" begin="0.6s" to="1" />
                                    <animate fill="freeze" attributeName="r" begin="0.6s" dur="0.4s" values="10;6" />
                                </circle>
                            </svg>
                        </template>
                        <template x-if="dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto text-white" width="20" height="20" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <g stroke-dasharray="2">
                                        <path d="M12 21v1M21 12h1M12 3v-1M3 12h-1">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="4;2" />
                                        </path>
                                        <path d="M18.5 18.5l0.5 0.5M18.5 5.5l0.5 -0.5M5.5 5.5l-0.5 -0.5M5.5 18.5l-0.5 0.5">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="4;2" />
                                        </path>
                                    </g>
                                    <path fill="currentColor" d="M7 6 C7 12.08 11.92 17 18 17 C18.53 17 19.05 16.96 19.56 16.89 C17.95 19.36 15.17 21 12 21 C7.03 21 3 16.97 3 12 C3 8.83 4.64 6.05 7.11 4.44 C7.04 4.95 7 5.47 7 6 Z" opacity="0">
                                        <set attributeName="opacity" begin="0.5s" to="1" />
                                    </path>
                                </g>
                                <g fill="currentColor" fill-opacity="0">
                                    <path d="m15.22 6.03l2.53-1.94L14.56 4L13.5 1l-1.06 3l-3.19.09l2.53 1.94l-.91 3.06l2.63-1.81l2.63 1.81z">
                                        <animate id="lineMdSunnyFilledLoopToMoonFilledLoopTransition0" fill="freeze" attributeName="fill-opacity" begin="0.6s;lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+6s" dur="0.4s" values="0;1" />
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+2.2s" dur="0.4s" values="1;0" />
                                    </path>
                                    <path d="M13.61 5.25L15.25 4l-2.06-.05L12.5 2l-.69 1.95L9.75 4l1.64 1.25l-.59 1.98l1.7-1.17l1.7 1.17z">
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+3s" dur="0.4s" values="0;1" />
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+5.2s" dur="0.4s" values="1;0" />
                                    </path>
                                    <path d="M19.61 12.25L21.25 11l-2.06-.05L18.5 9l-.69 1.95l-2.06.05l1.64 1.25l-.59 1.98l1.7-1.17l1.7 1.17z">
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+0.4s" dur="0.4s" values="0;1" />
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+2.8s" dur="0.4s" values="1;0" />
                                    </path>
                                    <path d="m20.828 9.731l1.876-1.439l-2.366-.067L19.552 6l-.786 2.225l-2.366.067l1.876 1.439L17.601 12l1.951-1.342L21.503 12z">
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+3.4s" dur="0.4s" values="0;1" />
                                        <animate fill="freeze" attributeName="fill-opacity" begin="lineMdSunnyFilledLoopToMoonFilledLoopTransition0.begin+5.6s" dur="0.4s" values="1;0" />
                                    </path>
                                </g>
                                <mask id="lineMdSunnyFilledLoopToMoonFilledLoopTransition1">
                                    <circle cx="12" cy="12" r="12" fill="#fff" />
                                    <circle cx="22" cy="2" r="3" fill="#fff">
                                        <animate fill="freeze" attributeName="cx" begin="0.1s" dur="0.4s" values="22;18" />
                                        <animate fill="freeze" attributeName="cy" begin="0.1s" dur="0.4s" values="2;6" />
                                        <animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="3;12" />
                                    </circle>
                                    <circle cx="22" cy="2" r="1">
                                        <animate fill="freeze" attributeName="cx" begin="0.1s" dur="0.4s" values="22;18" />
                                        <animate fill="freeze" attributeName="cy" begin="0.1s" dur="0.4s" values="2;6" />
                                        <animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="1;10" />
                                    </circle>
                                </mask>
                                <circle cx="12" cy="12" r="6" fill="currentColor" mask="url(#lineMdSunnyFilledLoopToMoonFilledLoopTransition1)">
                                    <set attributeName="opacity" begin="0.5s" to="0" />
                                    <animate fill="freeze" attributeName="r" begin="0.1s" dur="0.4s" values="6;10" />
                                </circle>
                            </svg>
                        </template>
                    </button>
                </li>
                <li class="flex items-center pl-4 xl:pr-4">
                    <a href="{{ route("karyawan.profile") }}" class="ease-nav-brand block px-0 py-2 text-sm font-semibold text-white transition-all">
                        @if (Auth::guard("karyawan")->user()->foto)
                            <div class="avatar">
                                <div class="w-6 rounded-full">
                                    <img src="{{ asset("storage/unggah/karyawan/" . Auth::guard("karyawan")->user()->foto) }}" />
                                </div>
                            </div>
                        @else
                            <i class="ri-user-3-fill sm:mr-1"></i>
                        @endif
                        <span class="hidden sm:inline">{{ Auth::guard("karyawan")->user()->nama_lengkap }}</span>
                    </a>
                </li>
                <li class="flex items-center px-4 xl:hidden">
                    <a href="javascript:;" class="ease-nav-brand block p-0 text-sm text-white transition-all" sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        </div>
                    </a>
                </li>
                {{-- <li class="flex items-center px-4">
                    <a href="javascript:;" class="ease-nav-brand p-0 text-sm text-white transition-all">
                        <i fixed-plugin-button-nav class="ri-settings-3-fill text-base cursor-pointer"></i>
                    </a>
                </li> --}}

                <!-- notifications -->
                <li class="relative flex items-center pr-2">
                    <p class="transform-dropdown-show hidden"></p>
                    <a href="javascript:;" class="ease-nav-brand block p-0 text-sm text-white transition-all" dropdown-trigger aria-expanded="false">
                        <i class="ri-notification-3-fill cursor-pointer"></i>
                    </a>

                    <ul dropdown-menu class="transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:text-5.5 dark:shadow-dark-xl dark:bg-slate-850 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-sm text-slate-500 opacity-0 transition-all before:absolute before:left-auto before:right-2 before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 before:sm:right-8 lg:absolute lg:left-auto lg:right-0 lg:mt-2 lg:block lg:cursor-pointer">
                        <!-- add show class on dropdown open js -->
                        <li class="relative mb-2">
                            <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 dark:hover:bg-slate-900 lg:transition-colors" href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset("img/team-2.jpg") }}" class="mr-4 inline-flex h-9 w-9 max-w-none items-center justify-center rounded-xl text-sm text-white" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New message</span> from Laur</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                            <i class="ri-time-fill mr-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative mb-2">
                            <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700 dark:hover:bg-slate-900" href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset("img/small-logos/logo-spotify.svg") }}" class="dark:from-slate-750 dark:to-gray-850 mr-4 inline-flex h-9 w-9 max-w-none items-center justify-center rounded-xl bg-gradient-to-tl from-zinc-800 to-zinc-700 text-sm text-white dark:bg-gradient-to-tl" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New album</span> by Travis Scott</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                            <i class="ri-time-fill mr-1"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative">
                            <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700 dark:hover:bg-slate-900" href="javascript:;">
                                <div class="flex py-1">
                                    <div class="ease-nav-brand my-auto mr-4 inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-tl from-slate-600 to-slate-300 text-sm text-white transition-all duration-200">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment successfully
                                            completed</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                                            <i class="ri-time-fill mr-1"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
