<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __("Data Karyawan") }}
            </h2>
            <label class="btn btn-primary btn-sm" for="create_modal">Tambah Data</label>
        </div>
    </x-slot>

    <div class="container mx-auto px-5 pt-5">
        <div>
            <form action="{{ route("admin.karyawan") }}" method="get" enctype="multipart/form-data" class="my-3">
                <div class="flex w-full flex-wrap gap-2 md:flex-nowrap">
                    <input type="text" name="nama_karyawan" placeholder="Nama Karyawan" class="input input-bordered w-full md:w-1/2" value="{{ request()->nama_karyawan }}" />
                    <select class="select select-bordered w-full md:w-1/2" name="kode_departemen">
                        <option disabled selected>Pilih departemen!</option>
                        @foreach ($departemen as $item)
                            <option value="{{ $item->kode }}" @if ($item->kode == request()->kode_departemen) selected @endif>{{ $item->nama }}</option>
                        @endforeach
                    </select>
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
                        <th>Departemen</th>
                        <th>Nama Lengkap</th>
                        <th>Foto</th>
                        <th>Jabatan</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $value => $item)
                        <tr class="hover">
                            <td class="font-bold">{{ $karyawan->firstItem() + $value }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->departemen->kode }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->nama_lengkap }}</td>
                            <td>
                                <div class="avatar">
                                    <div class="w-12 rounded-xl">
                                        @if ($item->foto)
                                            <img src="{{ asset("storage/unggah/karyawan/$item->foto") }}" />
                                        @else
                                            <img src="{{ asset("img/team-2.jpg") }}" />
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->jabatan }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->telepon }}</td>
                            <td class="text-slate-500 dark:text-slate-300">{{ $item->email }}</td>
                            <td>
                                <label class="btn btn-warning btn-sm" for="edit_button" onclick="return edit_button('{{ $item->nik }}')">
                                    <i class="ri-pencil-fill"></i>
                                </label>
                                <label class="btn btn-error btn-sm" onclick="return delete_button('{{ $item->nik }}', '{{ $item->nama_lengkap }}')">
                                    <i class="ri-delete-bin-line"></i>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-3 mb-5">
                {{ $karyawan->links() }}
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
                <form action="{{ route("admin.karyawan.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="reset" class="btn btn-neutral btn-sm">Reset</button>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">NIK<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="nik" placeholder="NIK" class="input input-bordered w-full text-blue-700" value="{{ old("nik") }}" required />
                        @error("nik")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Departemen<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <select name="departemen_id" class="select select-bordered w-full text-blue-700">
                            <option disabled selected>Pilih Departemen!</option>
                            @foreach ($departemen as $item)
                                <option value="{{ $item->id }}" @if ($item->id == old("departemen_id")) selected @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error("departemen_id")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Nama Lengkap<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="input input-bordered w-full text-blue-700" value="{{ old("nama_lengkap") }}" required />
                        @error("nama_lengkap")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Jabatan<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="jabatan" placeholder="Jabatan" class="input input-bordered w-full text-blue-700" value="{{ old("jabatan") }}" required />
                        @error("jabatan")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Telepon<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="text" name="telepon" placeholder="Telepon" class="input input-bordered w-full text-blue-700" value="{{ old("telepon") }}" required />
                        @error("telepon")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Email<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="email" name="email" placeholder="Email" class="input input-bordered w-full text-blue-700" value="{{ old("email") }}" required />
                        @error("email")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Password<span class="text-red-500">*</span></span>
                            </span>
                        </div>
                        <input type="password" name="password" placeholder="Password" class="input input-bordered w-full text-blue-700" value="{{ old("password") }}" required />
                        @error("password")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">
                                <span class="label-text font-semibold">Foto</span>
                            </span>
                        </div>
                        @error("foto")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="md:flex-0 mt-6 w-full max-w-full shrink-0 px-3 md:mt-0 md:w-4/12">
                            <input type="file" name="foto" id="foto" class="file-input file-input-bordered file-input-sm w-full" onchange="previewImage()" />
                        </div>
                        <img class="img-preview my-3 rounded" />
                    </label>
                    <button type="submit" class="btn btn-success form-control w-full text-white">Simpan</button>
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
                <form action="{{ route("admin.karyawan.update") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="nik_lama" hidden>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">NIK<span class="text-red-500">*</span></span>
                            <span class="label-text-alt" id="loading_edit1"></span>
                        </div>
                        <input type="text" name="nik" placeholder="NIK" class="input input-bordered w-full text-blue-700" required />
                        @error("nik")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">Departemen<span class="text-red-500">*</span></span>
                            <span class="label-text-alt" id="loading_edit2"></span>
                        </div>
                        <select name="departemen_id" id='departemen_id' class="select select-bordered w-full text-blue-700">
                        </select>
                        @error("departemen_id")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">Nama Lengkap<span class="text-red-500">*</span></span>
                            <span class="label-text-alt" id="loading_edit3"></span>
                        </div>
                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="input input-bordered w-full text-blue-700" required />
                        @error("nama_lengkap")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">Jabatan<span class="text-red-500">*</span></span>
                            <span class="label-text-alt" id="loading_edit4"></span>
                        </div>
                        <input type="text" name="jabatan" placeholder="Jabatan" class="input input-bordered w-full text-blue-700" required />
                        @error("jabatan")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">Telepon<span class="text-red-500">*</span></span>
                            <span class="label-text-alt" id="loading_edit5"></span>
                        </div>
                        <input type="text" name="telepon" placeholder="Telepon" class="input input-bordered w-full text-blue-700" required />
                        @error("telepon")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">Email<span class="text-red-500">*</span></span>
                            <span class="label-text-alt" id="loading_edit6"></span>
                        </div>
                        <input type="email" name="email" placeholder="Email" class="input input-bordered w-full text-blue-700" required />
                        @error("email")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-semibold">Foto</span>
                            <span class="label-text-alt" id="loading_edit7"></span>
                        </div>
                        @error("foto")
                            <div class="label">
                                <span class="label-text-alt text-sm text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="md:flex-0 mt-6 w-full max-w-full shrink-0 px-3 md:mt-0 md:w-4/12">
                            <input type="file" name="foto" id="foto_edit" class="file-input file-input-bordered file-input-sm w-full" onchange="previewImageEdit()" />
                        </div>
                        <img class="foto-edit-preview my-3 rounded" />
                    </label>
                    <button type="submit" class="btn btn-warning form-control w-full text-slate-700">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Akhir Modal Edit --}}

    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImageEdit() {
            const image = document.querySelector('#foto_edit');
            const imgPreview = document.querySelector('.foto-edit-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

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

        function edit_button(nik) {
            // Loading effect start
            let loading = `<span class="loading loading-dots loading-md text-purple-600"></span>`;
            $("#loading_edit1").html(loading);
            $("#loading_edit2").html(loading);
            $("#loading_edit3").html(loading);
            $("#loading_edit4").html(loading);
            $("#loading_edit5").html(loading);
            $("#loading_edit6").html(loading);
            $("#loading_edit7").html(loading);

            $("select[id='departemen_id']").children().remove().end();

            $.ajax({
                type: "get",
                url: "{{ route('admin.karyawan.edit') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "nik": nik
                },
                success: function(data) {
                    // console.log(data);
                    let items = [];
                    $.each(data, function(key, val) {
                        items.push(val);
                    });

                    $("input[name='nik_lama']").val(items[0]);
                    $("input[name='nik']").val(items[0]);
                    $("input[name='nama_lengkap']").val(items[2]);
                    $("input[name='jabatan']").val(items[4]);
                    $("input[name='telepon']").val(items[5]);
                    $("input[name='email']").val(items[6]);

                    const departemen = @json($departemen);
                    let options = '<option disabled>Pilih Departemen!</option>';
                    departemen.forEach(item => {
                        const isSelected = item.id == items[1] ? 'selected' : '';
                        options += `<option value="${item.id}" ${isSelected}>${item.nama}</option>`;
                    });
                    $("select[id='departemen_id']").html(options);

                    if (items[3] != null) {
                        $(".foto-edit-preview").attr("src", `{{ asset('storage/unggah/karyawan/${items[3]}') }}`);
                    } else {
                        $(".foto-edit-preview").attr("src", ``);
                    }

                    // Loading effect end
                    loading = "";
                    $("#loading_edit1").html(loading);
                    $("#loading_edit2").html(loading);
                    $("#loading_edit3").html(loading);
                    $("#loading_edit4").html(loading);
                    $("#loading_edit5").html(loading);
                    $("#loading_edit6").html(loading);
                    $("#loading_edit7").html(loading);
                }
            });
        }

        function delete_button(nik, nama) {
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
                        url: "{{ route('admin.karyawan.delete') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "nik": nik
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
