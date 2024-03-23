@extends("dashboard.layouts.main")

@section('js')
    <script src="{{ asset("js/carousel.js") }}"></script>
    <script src="{{ asset("js/charts.js") }}"></script>
@endsection

@section("container")
    <div>
        <!-- row 1 -->
        <div class="-mx-3 flex flex-wrap">
            <!-- card1 -->
            <div class="mb-6 w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl">
                    <div class="flex-auto p-4">
                        <div class="-mx-3 flex flex-row">
                            <div class="w-2/3 max-w-full flex-none px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal dark:text-white dark:opacity-60">
                                        Today's Money</p>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                    <p class="mb-0 dark:text-white dark:opacity-60">
                                        <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="basis-1/3 px-3 text-right">
                                <div class="rounded-circle inline-block h-12 w-12 bg-gradient-to-tl from-blue-500 to-violet-500 text-center">
                                    <i class="ri-money-dollar-box-line relative top-3 text-2xl leading-none text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="mb-6 w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl">
                    <div class="flex-auto p-4">
                        <div class="-mx-3 flex flex-row">
                            <div class="w-2/3 max-w-full flex-none px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal dark:text-white dark:opacity-60">
                                        Today's Users</p>
                                    <h5 class="mb-2 font-bold dark:text-white">2,300</h5>
                                    <p class="mb-0 dark:text-white dark:opacity-60">
                                        <span class="text-sm font-bold leading-normal text-emerald-500">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="basis-1/3 px-3 text-right">
                                <div class="rounded-circle inline-block h-12 w-12 bg-gradient-to-tl from-red-600 to-orange-600 text-center">
                                    <i class="ri-earth-line relative top-3 text-2xl leading-none text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="mb-6 w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl">
                    <div class="flex-auto p-4">
                        <div class="-mx-3 flex flex-row">
                            <div class="w-2/3 max-w-full flex-none px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal dark:text-white dark:opacity-60">
                                        New Clients</p>
                                    <h5 class="mb-2 font-bold dark:text-white">+3,462</h5>
                                    <p class="mb-0 dark:text-white dark:opacity-60">
                                        <span class="text-sm font-bold leading-normal text-red-600">-2%</span>
                                        since last quarter
                                    </p>
                                </div>
                            </div>
                            <div class="basis-1/3 px-3 text-right">
                                <div class="rounded-circle inline-block h-12 w-12 bg-gradient-to-tl from-emerald-500 to-teal-400 text-center">
                                    <i class="ri-file-paper-2-line relative top-3 text-2xl leading-none text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card4 -->
            <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl bg-white bg-clip-border shadow-xl">
                    <div class="flex-auto p-4">
                        <div class="-mx-3 flex flex-row">
                            <div class="w-2/3 max-w-full flex-none px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold uppercase leading-normal dark:text-white dark:opacity-60">
                                        Sales</p>
                                    <h5 class="mb-2 font-bold dark:text-white">$103,430</h5>
                                    <p class="mb-0 dark:text-white dark:opacity-60">
                                        <span class="text-sm font-bold leading-normal text-emerald-500">+5%</span>
                                        than last month
                                    </p>
                                </div>
                            </div>
                            <div class="basis-1/3 px-3 text-right">
                                <div class="rounded-circle inline-block h-12 w-12 bg-gradient-to-tl from-orange-500 to-yellow-500 text-center">
                                    <i class="ri-shopping-cart-2-fill relative top-3 text-2xl leading-none text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cards row 2 -->
        <div class="-mx-3 mt-6 flex flex-wrap">
            <div class="mt-0 w-full max-w-full px-3 lg:w-7/12 lg:flex-none">
                <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border shadow-xl">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pb-0 pt-4">
                        <h6 class="capitalize dark:text-white">Sales overview</h6>
                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                            <i class="ri-arrow-up-line text-emerald-500"></i>
                            <span class="font-semibold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <canvas id="chart-line" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                <div slider class="relative h-full w-full overflow-hidden rounded-2xl">
                    <!-- slide 1 -->
                    <div slide class="absolute h-full w-full transition-all duration-500">
                        <img class="h-full object-cover" src="{{ asset("img/carousel-1.jpg") }}" alt="carousel image" />
                        <div class="absolute bottom-0 left-0 right-[15%] ml-12 block pb-5 pt-5 text-start text-white">
                            <div class="mb-4 inline-block h-8 w-8 rounded-lg bg-white bg-center fill-current stroke-none text-center text-black">
                                <i class="top-0.75 ri-camera-3-fill relative text-base text-slate-700"></i>
                            </div>
                            <h5 class="mb-1 text-white">Get started with Argon</h5>
                            <p class="dark:opacity-80">There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                        </div>
                    </div>

                    <!-- slide 2 -->
                    <div slide class="absolute h-full w-full transition-all duration-500">
                        <img class="h-full object-cover" src="{{ asset("img/carousel-2.jpg") }}" alt="carousel image" />
                        <div class="absolute bottom-0 left-0 right-[15%] ml-12 block pb-5 pt-5 text-start text-white">
                            <div class="mb-4 inline-block h-8 w-8 rounded-lg bg-white bg-center fill-current stroke-none text-center text-black">
                                <i class="top-0.75 ri-lightbulb-fill relative text-base text-slate-700"></i>
                            </div>
                            <h5 class="mb-1 text-white">Faster way to create web pages</h5>
                            <p class="dark:opacity-80">That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                        </div>
                    </div>

                    <!-- slide 3 -->
                    <div slide class="absolute h-full w-full transition-all duration-500">
                        <img class="h-full object-cover" src="{{ asset("img/carousel-3.jpg") }}" alt="carousel image" />
                        <div class="absolute bottom-0 left-0 right-[15%] ml-12 block pb-5 pt-5 text-start text-white">
                            <div class="mb-4 inline-block h-8 w-8 rounded-lg bg-white bg-center fill-current stroke-none text-center text-black">
                                <i class="top-0.75 ri-trophy-fill relative text-base text-slate-700"></i>
                            </div>
                            <h5 class="mb-1 text-white">Share with us your design tips!</h5>
                            <p class="dark:opacity-80">Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                        </div>
                    </div>

                    <!-- Control buttons -->
                    <button btn-next class="ri-arrow-right-s-fill absolute right-4 top-6 z-10 h-10 w-10 cursor-pointer border-none p-2 text-lg text-white opacity-50 hover:opacity-100 active:scale-110"></button>
                    <button btn-prev class="ri-arrow-left-s-fill absolute right-16 top-6 z-10 h-10 w-10 cursor-pointer border-none p-2 text-lg text-white opacity-50 hover:opacity-100 active:scale-110"></button>
                </div>
            </div>
        </div>

        <!-- cards row 3 -->
        <div class="-mx-3 mt-6 flex flex-wrap">
            <div class="mb-6 mt-0 w-full max-w-full px-3 lg:mb-0 lg:w-7/12 lg:flex-none">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl border-black-125 relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border shadow-xl dark:bg-gray-950">
                    <div class="rounded-t-4 mb-0 p-4 pb-0">
                        <div class="flex justify-between">
                            <h6 class="mb-2 dark:text-white">Sales by Country</h6>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="mb-4 w-full border-collapse items-center border-gray-200 align-top dark:border-white/40">
                            <tbody>
                                <tr>
                                    <td class="w-3/10 whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="{{ asset("img/icons/flags/US.png") }}" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                                                </p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">United States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">2500</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">$230,900</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle text-sm leading-normal dark:border-white/40">
                                        <div class="flex-1 text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-3/10 whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="{{ asset("img/icons/flags/DE.png") }}" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                                                </p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">3.900</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">$440,000</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle text-sm leading-normal dark:border-white/40">
                                        <div class="flex-1 text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-3/10 whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="{{ asset("img/icons/flags/GB.png") }}" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                                                </p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">Great Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">1.400</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle dark:border-white/40">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">$190,700</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-b bg-transparent p-2 align-middle text-sm leading-normal dark:border-white/40">
                                        <div class="flex-1 text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-3/10 whitespace-nowrap border-0 bg-transparent p-2 align-middle">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="{{ asset("img/icons/flags/BR.png") }}" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                                                </p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-0 bg-transparent p-2 align-middle">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">562</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-0 bg-transparent p-2 align-middle">
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">$143,960</h6>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap border-0 bg-transparent p-2 align-middle text-sm leading-normal">
                                        <div class="flex-1 text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-0 w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border shadow-xl">
                    <div class="rounded-t-4 p-4 pb-0">
                        <h6 class="mb-0 dark:text-white">Categories</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="mb-0 flex flex-col rounded-lg pl-0">
                            <li class="relative mb-2 flex justify-between rounded-xl rounded-t-lg border-0 py-2 pr-4 text-inherit">
                                <div class="flex items-center">
                                    <div class="dark:from-slate-750 dark:to-gray-850 mr-4 inline-block h-8 w-8 rounded-xl bg-gradient-to-tl from-zinc-800 to-zinc-700 bg-center fill-current stroke-none text-center text-black shadow-sm dark:bg-gradient-to-tl">
                                        <i class="ri-smartphone-line top-0.75 text-xs relative text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Devices</h6>
                                        <span class="text-xs leading-tight dark:text-white/80">250 in stock, <span class="font-semibold">346+ sold</span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button class="leading-pro rounded-3.5xl p-1.2 h-6.5 w-6.5 group mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle text-xs font-bold text-slate-700 shadow-none transition-all ease-in dark:text-white"><i class="ri-arrow-right-line ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="relative mb-2 flex justify-between rounded-xl border-0 py-2 pr-4 text-inherit">
                                <div class="flex items-center">
                                    <div class="dark:from-slate-750 dark:to-gray-850 mr-4 inline-block h-8 w-8 rounded-xl bg-gradient-to-tl from-zinc-800 to-zinc-700 bg-center fill-current stroke-none text-center text-black shadow-sm dark:bg-gradient-to-tl">
                                        <i class="ri-price-tag-3-fill top-0.75 text-xs relative text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Tickets</h6>
                                        <span class="text-xs leading-tight dark:text-white/80">123 closed, <span class="font-semibold">15 open</span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button class="leading-pro rounded-3.5xl p-1.2 h-6.5 w-6.5 group mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle text-xs font-bold text-slate-700 shadow-none transition-all ease-in dark:text-white"><i class="ri-arrow-right-line ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="relative mb-2 flex justify-between rounded-xl rounded-b-lg border-0 py-2 pr-4 text-inherit">
                                <div class="flex items-center">
                                    <div class="dark:from-slate-750 dark:to-gray-850 mr-4 inline-block h-8 w-8 rounded-xl bg-gradient-to-tl from-zinc-800 to-zinc-700 bg-center fill-current stroke-none text-center text-black shadow-sm dark:bg-gradient-to-tl">
                                        <i class="ri-box-2-line top-0.75 text-xs relative text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Error logs</h6>
                                        <span class="text-xs leading-tight dark:text-white/80">1 is active, <span class="font-semibold">40
                                                closed</span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button class="leading-pro rounded-3.5xl p-1.2 h-6.5 w-6.5 group mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle text-xs font-bold text-slate-700 shadow-none transition-all ease-in dark:text-white"><i class="ri-arrow-right-line ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="relative flex justify-between rounded-xl rounded-b-lg border-0 py-2 pr-4 text-inherit">
                                <div class="flex items-center">
                                    <div class="dark:from-slate-750 dark:to-gray-850 mr-4 inline-block h-8 w-8 rounded-xl bg-gradient-to-tl from-zinc-800 to-zinc-700 bg-center fill-current stroke-none text-center text-black shadow-sm dark:bg-gradient-to-tl">
                                        <i class="ri-user-smile-fill top-0.75 text-xs relative text-white"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Happy users</h6>
                                        <span class="text-xs leading-tight dark:text-white/80"><span class="font-semibold">+ 430
                                            </span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button class="leading-pro rounded-3.5xl p-1.2 h-6.5 w-6.5 group mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle text-xs font-bold text-slate-700 shadow-none transition-all ease-in dark:text-white"><i class="ri-arrow-right-line ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
