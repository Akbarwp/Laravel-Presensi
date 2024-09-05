<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __("Monitoring Presensi") }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-5 pt-5">
        <div>
            <form action="{{ route("admin.monitoring-presensi") }}" method="get" enctype="multipart/form-data" class="my-3">
                <div class="flex w-full flex-wrap gap-2 md:flex-nowrap">
                    <input type="date" name="tanggal_presensi" placeholder="Pencarian" class="input input-bordered w-full" value="{{ request()->tanggal_presensi ? request()->tanggal_presensi : Carbon\Carbon::now()->format("Y-m-d") }}" />
                    <button type="submit" class="btn btn-success w-full md:w-14">
                        <i class="ri-search-2-line text-lg text-white"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="w-full overflow-x-auto rounded-md bg-slate-200 px-10">
            <table id="tabelPresensi" class="table mb-4 w-full border-collapse items-center border-gray-200 align-top dark:border-white/40">
                <thead class="text-sm text-gray-800 dark:text-gray-300">
                    <tr>
                        <th></th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Departemen</th>
                        <th>Jam Masuk</th>
                        <th>Foto & Lokasi</th>
                        <th>Jam Keluar</th>
                        <th>Foto & Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monitoring as $value => $item)
                        <tr class="hover">
                            <td class="font-bold">{{ $monitoring->firstItem() + $value }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->nik }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->nama_karyawan }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->nama_departemen }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->jam_masuk }}</td>
                            <td class="text-slate-500 dark:text-slate-300">
                                <div class="avatar">
                                    <div class="w-24 rounded">
                                        <label for="view_modal" class="cursor-pointer" onclick="return viewLokasi('lokasi_masuk', '{{ $item->nik }}')">
                                            <img src="{{ asset("storage/unggah/presensi/$item->foto_masuk") }}" alt="{{ $item->foto_masuk }}" />
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="text-slate-500 dark:text-slate-300">
                                @if ($item->jam_keluar)
                                    {{ $item->jam_keluar }}
                                @else
                                    <div class="w-fit rounded-md bg-error p-1 text-white">Belum Presensi</div>
                                @endif
                            </td>
                            <td class="text-slate-500 dark:text-slate-300">
                                <div class="avatar">
                                    <div class="w-24 rounded">
                                        @if ($item->foto_keluar)
                                            <label for="view_modal" class="cursor-pointer" onclick="return viewLokasi('lokasi_keluar', '{{ $item->nik }}')">
                                                <img src="{{ asset("storage/unggah/presensi/$item->foto_keluar") }}" alt="{{ $item->foto_keluar }}" />
                                            </label>
                                        @else
                                            <span></span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-slate-500 dark:text-slate-300">
                                @if ($item->jam_masuk > Carbon\Carbon::make("08:00:00")->format("H:i:s"))
                                    @php
                                        $masuk = Carbon\Carbon::make($item->jam_masuk);
                                        $batas = Carbon\Carbon::make("08:00:00");
                                        $diff = $masuk->diff($batas);
                                        if ($diff->format("%h") != 0) {
                                            $selisih = $diff->format("%h jam %I menit");
                                        } else {
                                            $selisih = $diff->format("%I menit");
                                        }
                                    @endphp
                                    <div class="w-fit rounded-md bg-error p-1 text-white">Terlambat {{ $selisih }}</div>
                                @else
                                    <div class="w-fit rounded-md bg-success p-1 text-white">Tepat Waktu</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-3 mb-5">
                {{ $monitoring->links() }}
            </div>
        </div>
    </div>

    {{-- Awal Modal View Lokasi --}}
    <input type="checkbox" id="view_modal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <div class="mb-3 flex justify-between">
                <h3 class="judul-lokasi text-lg font-bold"></h3>
                <label for="view_modal" class="cursor-pointer">
                    <i class="ri-close-large-fill"></i>
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text font-semibold">
                            <span class="label-text font-semibold">Koordinat</span>
                            <span class="label-text-alt" id="loading_edit1"></span>
                        </span>
                    </div>
                    <input type="text" name="lokasi" placeholder="Lokasi" class="input input-bordered w-full text-blue-700" readonly />
                    <div id="lokasi-map" class="mx-auto mt-3 h-80 w-full rounded-md"></div>
                </label>
            </div>
        </div>
    </div>
    {{-- Akhir Modal View Lokasi --}}

    <script>
        @if (session()->has("success"))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if (session()->has("error"))
            Swal.fire({
                title: 'Gagal',
                text: '{{ session("error") }}',
                icon: 'error',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        function maps(latitude, longitude) {
            let map = L.map('lokasi-map').setView([latitude, longitude], 17);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup("<b>Anda berada di sini</b>").openPopup();

            let circle = L.circle([{{ $lokasiKantor->latitude }}, {{ $lokasiKantor->longitude }}], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: {{ $lokasiKantor->radius }}
            }).addTo(map);
        }

        function viewLokasi(tipe, nik) {
            // Loading effect start
            let loading = `<span class="loading loading-dots loading-md text-purple-600"></span>`;
            $("#loading_edit1").html(loading);

            $.ajax({
                type: "post",
                url: "{{ route("admin.monitoring-presensi.lokasi") }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tipe": tipe,
                    "nik": nik,
                },
                success: function(data) {
                    // console.log(data);
                    let items = [];
                    $.each(data, function(key, val) {
                        items.push(val);
                    });

                    $(".judul-lokasi").html(tipe);
                    $("input[name='lokasi']").val(items[0]);

                    // Loading effect end
                    loading = "";
                    $("#loading_edit1").html(loading);

                    let lokasi = items[0].split(",");
                    maps(lokasi[0], lokasi[1]);
                }
            });
        }
    </script>
</x-app-layout>
