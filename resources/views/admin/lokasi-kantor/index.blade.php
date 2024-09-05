<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __("Lokasi Kantor") }}
            </h2>
            <label class="btn btn-primary btn-sm" for="create_modal">Tambah Data</label>
        </div>
    </x-slot>

    <div class="container mx-auto px-5 pt-5">
        <div class="w-full overflow-x-auto rounded-md bg-slate-200 px-10">
            <table id="tabelPresensi" class="table mb-4 w-full border-collapse items-center border-gray-200 align-top dark:border-white/40">
                <thead class="text-sm text-gray-800 dark:text-gray-300">
                    <tr>
                        <th></th>
                        <th>Kota</th>
                        <th>Alamat</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Is Used?</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasiKantor as $value => $item)
                        <tr class="hover">
                            <td class="font-bold">{{ $lokasiKantor->firstItem() + $value }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->kota }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->alamat }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->latitude }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->longitude }}</td>
                            <td class="text-slate-500 dark:text-slate-300">
                                @if ($item->is_used)
                                    <i class="ri-checkbox-circle-fill text-lg text-success"></i>
                                @else
                                    <i class="ri-close-circle-fill text-lg text-error"></i>
                                @endif
                            </td>
                            <td>
                                <label class="btn btn-warning btn-sm" for="edit_button" onclick="return edit_button('{{ $item->id }}')">
                                    <i class="ri-pencil-fill"></i>
                                </label>
                                <label class="btn btn-error btn-sm" onclick="return delete_button('{{ $item->id }}', '{{ $item->nama }}')">
                                    <i class="ri-delete-bin-line"></i>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-3 mb-5">
                {{ $lokasiKantor->links() }}
            </div>
        </div>
    </div>

    {{-- Awal Modal Create --}}
    <input type="checkbox" id="create_modal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <div class="mb-3 flex justify-between">
                <h3 class="text-lg font-bold">Tambah {{ $title }}</h3>
                <label for="create_modal" class="cursor-pointer">
                    <i class="ri-close-large-fill"></i>
                </label>
            </div>
            <div>
                <form action="{{ route("admin.lokasi-kantor.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="reset" class="btn btn-neutral btn-sm">Reset</button>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Kota<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="kota" placeholder="Kota" class="input input-bordered w-full text-blue-700" value="{{ old("kota") }}" required />
                        @error("kota")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Alamat<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <textarea name="alamat" placeholder="Alamat" class="textarea textarea-bordered w-full text-blue-700">{{ old("alamat") }}</textarea>
                        @error("alamat")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Latitude<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="latitude" placeholder="Latitude" class="input input-bordered w-full text-blue-700" value="{{ old("latitude") }}" required />
                        @error("latitude")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Longitude<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="longitude" placeholder="Longitude" class="input input-bordered w-full text-blue-700" value="{{ old("longitude") }}" required />
                        @error("longitude")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Radius<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="number" min="0" name="radius" placeholder="Radius" class="input input-bordered w-full text-blue-700" value="{{ old("radius") }}" required />
                        @error("radius")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <div>
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Is Used?<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Iya</span>
                                <input type="radio" name="is_used" value='1' class="radio checked:bg-red-500" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Tidak</span>
                                <input type="radio" name="is_used" value='0' class="radio checked:bg-blue-500" checked />
                            </label>
                        </div>
                        @error("is_used")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mt-3 w-full text-white">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Akhir Modal Create --}}

    {{-- Awal Modal Edit --}}
    <input type="checkbox" id="edit_button" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <div class="mb-3 flex justify-between">
                <h3 class="text-lg font-bold">Ubah {{ $title }}</h3>
                <label for="edit_button" class="cursor-pointer">
                    <i class="ri-close-large-fill"></i>
                </label>
            </div>
            <div>
                <form action="{{ route("admin.lokasi-kantor.update") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Kota<span class="text-red-500">*</span></span>
                                <span class="label-text-alt" id="loading_edit1"></span>
                            </span>
                        </div>
                        <input type="text" name="kota" placeholder="Kota" class="input input-bordered w-full text-blue-700" value="{{ old("kota") }}" required />
                        @error("kota")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Alamat<span class="text-red-500">*</span></span>
                                <span class="label-text-alt" id="loading_edit2"></span>
                            </span>
                        </div>
                        <textarea name="alamat" placeholder="Alamat" class="textarea textarea-bordered w-full text-blue-700">{{ old("alamat") }}</textarea>
                        @error("alamat")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Latitude<span class="text-red-500">*</span></span>
                                <span class="label-text-alt" id="loading_edit3"></span>
                            </span>
                        </div>
                        <input type="text" name="latitude" placeholder="Latitude" class="input input-bordered w-full text-blue-700" value="{{ old("latitude") }}" required />
                        @error("latitude")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Longitude<span class="text-red-500">*</span></span>
                                <span class="label-text-alt" id="loading_edit4"></span>
                            </span>
                        </div>
                        <input type="text" name="longitude" placeholder="Longitude" class="input input-bordered w-full text-blue-700" value="{{ old("longitude") }}" required />
                        @error("longitude")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Radius<span class="text-red-500">*</span></span>
                                <span class="label-text-alt" id="loading_edit6"></span>
                            </span>
                        </div>
                        <input type="number" min="0" name="radius" placeholder="Radius" class="input input-bordered w-full text-blue-700" value="{{ old("radius") }}" required />
                        @error("radius")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <div>
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Is Used?<span class="text-red-500">*</span></span>
                                <span class="label-text-alt" id="loading_edit5"></span>
                            </span>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Iya</span>
                                <input type="radio" name="is_used" value='1' class="radio checked:bg-red-500" />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Tidak</span>
                                <input type="radio" name="is_used" value='0' class="radio checked:bg-blue-500" checked />
                            </label>
                        </div>
                        @error("is_used")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning mt-3 w-full text-slate-700">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Akhir Modal Edit --}}

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

        function edit_button(id) {
            // Loading effect start
            let loading = `<span class="loading loading-dots loading-md text-purple-600"></span>`;
            $("#loading_edit1").html(loading);
            $("#loading_edit2").html(loading);
            $("#loading_edit3").html(loading);
            $("#loading_edit4").html(loading);
            $("#loading_edit5").html(loading);
            $("#loading_edit6").html(loading);

            $.ajax({
                type: "get",
                url: "{{ route('admin.lokasi-kantor.edit') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(data) {
                    // console.log(data);
                    let items = [];
                    $.each(data, function(key, val) {
                        items.push(val);
                    });

                    $("input[name='id']").val(items[0]);
                    $("input[name='kota']").val(items[1]);
                    $("textarea[name='alamat']").html(items[2]);
                    $("input[name='latitude']").val(items[3]);
                    $("input[name='longitude']").val(items[4]);
                    $("input[name='radius']").val(items[5]);
                    if (items[6] == 1) {
                        $("input[name='is_used'][value='1']").prop('checked', true);
                    } else if (items[6] == 0) {
                        $("input[name='is_used'][value='0']").prop('checked', true);
                    }


                    // Loading effect end
                    loading = "";
                    $("#loading_edit1").html(loading);
                    $("#loading_edit2").html(loading);
                    $("#loading_edit3").html(loading);
                    $("#loading_edit4").html(loading);
                    $("#loading_edit5").html(loading);
                    $("#loading_edit6").html(loading);
                }
            });
        }

        function delete_button(id, nama) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                html: "<p>Data yang dihapus tidak dapat dipulihkan kembali!</p>" +
                    "<div class='divider'></div>" +
                    "<div class='flex flex-col'>" +
                    "<b>Karyawan: " + nama + "</b>" +
                    "</div>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6419E6',
                cancelButtonColor: '#F87272',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('admin.lokasi-kantor.delete') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#6419E6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.responseJSON.message
                            })
                        }
                    });
                }
            })
        }
    </script>
</x-app-layout>
