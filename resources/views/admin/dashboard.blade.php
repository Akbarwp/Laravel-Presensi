<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Dashboard") }}
        </h2>
    </x-slot>

    <div class="px-5 pt-5">
        <div class="w-full flex flex-wrap xl:flex-nowrap justify-center gap-3">
            <div class="card card-side shadow-xl bg-white text-gray-800 px-3 w-full md:w-1/4 lg:w-1/5">
                <div class="flex items-center">
                    <i class="ri-team-line text-5xl md:text-3xl lg:text-5xl"></i>
                    <div class="card-body">
                        <h2 class="card-title md:text-base">{{ $totalKaryawan }}</h2>
                        <p class="text-lg md:text-sm">Total Karyawan</p>
                    </div>
                </div>
            </div>
            <div class="card card-side shadow-xl bg-white text-gray-800 px-3 w-full md:w-1/4 lg:w-1/5">
                <div class="flex items-center">
                    <i class="ri-fingerprint-fill text-5xl md:text-3xl lg:text-5xl"></i>
                    <div class="card-body">
                        <h2 class="card-title md:text-base">{{ $rekapPresensi->jml_kehadiran }}</h2>
                        <p class="text-lg md:text-sm">Karyawan Hadir</p>
                    </div>
                </div>
            </div>
            <div class="card card-side shadow-xl bg-white text-gray-800 px-3 w-full md:w-1/4 lg:w-1/5">
                <div class="flex items-center">
                    <i class="ri-hospital-line text-5xl md:text-3xl lg:text-5xl"></i>
                    <div class="card-body">
                        <h2 class="card-title md:text-base">{{ $rekapPengajuanPresensi->jml_sakit }}</h2>
                        <p class="text-lg md:text-sm">Karyawan Sakit</p>
                    </div>
                </div>
            </div>
            <div class="card card-side shadow-xl bg-white text-gray-800 px-3 w-full md:w-1/4 lg:w-1/5">
                <div class="flex items-center">
                    <i class="ri-hospital-line text-5xl md:text-3xl lg:text-5xl"></i>
                    <div class="card-body">
                        <h2 class="card-title md:text-base">{{ $rekapPengajuanPresensi->jml_izin }}</h2>
                        <p class="text-lg md:text-sm">Karyawan Izin</p>
                    </div>
                </div>
            </div>
            <div class="card card-side shadow-xl bg-white text-gray-800 px-3 w-full md:w-1/4 lg:w-1/5">
                <div class="flex items-center">
                    <i class="ri-time-line text-5xl md:text-3xl lg:text-5xl"></i>
                    <div class="card-body">
                        <h2 class="card-title md:text-base">{{ $rekapPresensi->jml_terlambat }}</h2>
                        <p class="text-lg md:text-sm">Karyawan Terlambat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
