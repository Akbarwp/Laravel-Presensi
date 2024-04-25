@extends("dashboard.layouts.main")

@section("js")
    <script>
        let notifikasi_berhasil = document.getElementById('notifikasi_berhasil');
        setInterval(() => {
            notifikasi_berhasil.style.display = 'none';
        }, 3000);

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
    </script>
@endsection

@section("container")
    <div>
        <div class="relative mx-auto mt-36 w-full">
            <div class="dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl relative mx-6 flex min-w-0 flex-auto flex-col overflow-hidden break-words rounded-2xl border-0 bg-white bg-clip-border p-4">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-auto max-w-full flex-none px-3">
                        <div class="h-19 w-19 relative flex items-center justify-center rounded-xl text-5xl text-slate-700 transition-all duration-200 ease-in-out dark:text-white">
                            @if ($karyawan->foto)
                                <div class="avatar">
                                    <div class="w-20 rounded-full">
                                        <img src="{{ asset("storage/unggah/karyawan/$karyawan->foto") }}" />
                                    </div>
                                </div>
                            @else
                                <i class="ri-user-fill"></i>
                            @endif
                        </div>
                    </div>
                    <div class="my-auto w-auto max-w-full flex-none px-3">
                        <div class="h-full">
                            <h5 class="mb-1 dark:text-white">{{ $karyawan->nama_lengkap }}</h5>
                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $karyawan->jabatan }}</p>
                        </div>
                    </div>
                    @if (session()->get("success"))
                        <div id="notifikasi_berhasil" class="mx-auto mt-4 w-full max-w-full px-3 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                            <div class="relative right-0">
                                <ul class="relative flex list-none flex-wrap rounded-xl bg-success p-1">
                                    <li class="z-30 flex-auto text-center">
                                        <a class="z-30 mb-0 flex w-full items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 text-white transition-all ease-in-out">
                                            <i class="ni ni-app"></i>
                                            <span class="ml-2">{{ session("success") }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (session()->get("error"))
                        <div id="notifikasi_berhasil" class="mx-auto mt-4 w-full max-w-full px-3 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                            <div class="relative right-0">
                                <ul class="relative flex list-none flex-wrap rounded-xl bg-error p-1">
                                    <li class="z-30 flex-auto text-center">
                                        <a class="z-30 mb-0 flex w-full items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 text-white transition-all ease-in-out">
                                            <i class="ni ni-app"></i>
                                            <span class="ml-2">{{ session("error") }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{ route("karyawan.profile.update") }}" method="post" enctype="multipart/form-data" class="-mx-3 flex flex-wrap p-6">
            @csrf
            <div class="md:flex-0 w-full max-w-full shrink-0 px-3 md:w-8/12">
                <div class="dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 bg-white bg-clip-border shadow-xl">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Edit Profile</p>
                            <button type="submit" onclick="return confirm('Are you sure?')" class="tracking-tight-rem hover:shadow-xs active:opacity-85 mb-4 ml-auto inline-block cursor-pointer rounded-lg border-0 bg-yellow-400 px-8 py-2 text-center align-middle text-xs font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px">Update</button>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        <p class="text-sm uppercase leading-normal dark:text-white dark:opacity-60">User Information</p>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="md:flex-0 w-full max-w-full shrink-0 px-3 md:w-6/12">
                                <div class="mb-4">
                                    <label for="nik" class="mb-2 ml-1 inline-block text-xs font-bold text-slate-700 dark:text-white/80">NIK</label>
                                    <input type="text" name="nik" value="{{ $karyawan->nik }}" class="focus:shadow-primary-outline dark:bg-slate-850 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none dark:text-white" readonly />
                                </div>
                            </div>
                            <div class="md:flex-0 w-full max-w-full shrink-0 px-3 md:w-6/12">
                                <div class="mb-4">
                                    <label for="email" class="mb-2 ml-1 inline-block text-xs font-bold text-slate-700 dark:text-white/80">Email</label>
                                    <input type="email" name="email" value="{{ $karyawan->email }}" class="focus:shadow-primary-outline dark:bg-slate-850 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none dark:text-white" readonly />
                                </div>
                            </div>
                            <div class="md:flex-0 w-full max-w-full shrink-0 px-3 md:w-6/12">
                                <div class="mb-4">
                                    <label for="nama_lengkap" class="mb-2 ml-1 inline-block text-xs font-bold text-slate-700 dark:text-white/80">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ $karyawan->nama_lengkap }}" class="focus:shadow-primary-outline dark:bg-slate-850 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none dark:text-white" />
                                </div>
                            </div>
                            <div class="md:flex-0 w-full max-w-full shrink-0 px-3 md:w-6/12">
                                <div class="mb-4">
                                    <label for="telepon" class="mb-2 ml-1 inline-block text-xs font-bold text-slate-700 dark:text-white/80">Telepon</label>
                                    <input type="text" name="telepon" value="{{ $karyawan->telepon }}" class="focus:shadow-primary-outline dark:bg-slate-850 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none dark:text-white" />
                                </div>
                            </div>
                            <div class="md:flex-0 w-full max-w-full shrink-0 px-3 md:w-6/12">
                                <div class="mb-4">
                                    <label for="password" class="mb-2 ml-1 inline-block text-xs font-bold text-slate-700 dark:text-white/80">Password</label>
                                    <input type="password" name="password" class="focus:shadow-primary-outline dark:bg-slate-850 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 text-sm font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none dark:text-white" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:flex-0 mt-6 w-full max-w-full shrink-0 px-3 md:mt-0 md:w-4/12">
                @if ($karyawan->foto)
                    <img src="{{ asset("storage/unggah/karyawan/$karyawan->foto") }}" class="img-preview mb-3 rounded" />
                @else
                    <img src="{{ asset("img/carousel-3.jpg") }}" class="img-preview mb-3 rounded" />
                @endif
                <input type="file" name="foto" id="foto" class="file-input file-input-bordered w-full" onchange="previewImage()" />
            </div>
        </form>
    </div>
@endsection
