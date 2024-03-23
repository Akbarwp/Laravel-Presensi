<aside class="dark:bg-slate-850 max-w-64 ease-nav-brand z-990 fixed inset-y-0 my-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-xl transition-transform duration-200 dark:shadow-none xl:left-0 xl:ml-6 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
        <i class="ri-close-large-fill absolute right-0 top-0 cursor-pointer p-4 text-slate-400 opacity-50 dark:text-white xl:hidden" sidenav-close></i>
        <a class="m-0 block whitespace-nowrap px-8 py-6 text-sm text-slate-700 dark:text-white" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <img src="{{ asset('img/logo-ct-dark.png') }}" class="ease-nav-brand inline h-full max-h-8 max-w-full transition-all duration-200 dark:hidden" alt="main_logo" />
            <img src="{{ asset('img/logo-ct.png') }}" class="ease-nav-brand hidden h-full max-h-8 max-w-full transition-all duration-200 dark:inline" alt="main_logo" />
            <span class="ease-nav-brand ml-1 font-semibold transition-all duration-200">Laundry Lurah</span>
        </a>
    </div>

    <hr class="mt-0 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="h-sidenav block max-h-screen w-auto grow basis-full items-center overflow-auto">
        <ul class="mb-0 flex flex-col pl-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80 {{ Request::routeIs(['dashboard']) ? 'rounded-lg font text-slate-700 bg-blue-500/13' : '' }}" href="{{ route('dashboard') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-tv-2-line relative top-0 text-lg leading-normal text-blue-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/tables.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-calendar-todo-fill relative top-0 text-lg leading-normal text-orange-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Tables</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/billing.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="ri-bank-card-fill relative top-0 text-lg leading-normal text-emerald-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Billing</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/virtual-reality.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-instance-fill relative top-0 text-lg leading-normal text-cyan-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Virtual Reality</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/rtl.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-global-line relative top-0 text-lg leading-normal text-red-600"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">RTL</span>
                </a>
            </li>

            <li class="mt-4 w-full">
                <h6 class="ml-2 pl-6 text-xs font-bold uppercase leading-tight opacity-60 dark:text-white">Account pages</h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/profile.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-user-3-fill relative top-0 text-lg leading-normal text-slate-700"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Profile</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/sign-in.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-file-copy-2-fill relative top-0 text-lg leading-normal text-orange-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Sign In</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/sign-up.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-login-box-line relative top-0 text-lg leading-normal text-cyan-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Sign Up</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                {{-- <a class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80" href="./pages/sign-up.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="ri-login-box-line relative top-0 text-lg leading-normal text-cyan-500"></i>
                    </div>
                    <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Sign Up</span>
                </a> --}}
                <form method="POST" action="{{ route('logout.auth') }}">
                    @csrf
                    <button type="submit" class="py-2.7 ease-nav-brand mx-2 my-0 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="ri-logout-box-line relative top-0 text-lg leading-normal text-red-500"></i>
                        </div>
                        <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
