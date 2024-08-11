<!doctype html>
<html class="h-full bg-gray-900">
<head class="h-full">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Kegiatan Praktik STM - Admin</title>
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full">
<div x-data="{ open: false }" @keydown.window.escape="open = false">

  <!-- Mobile Navbar -->
  @include('admin.components.navbar')

  <!-- Desktop Sidebar -->
  @include('admin.components.sidebar')

  <!-- Header Sidebar -->
  @include('admin.components.header')

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative flex justify-center overflow-hidden rounded-xl">
        <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">
          <div>
            <h2 class="text-base font-semibold leading-7 text-white">Tambah Data Praktik</h2>
            <p class="mt-1 text-sm leading-6 text-gray-400">Tambahkan informasi terbaru mengenai praktik siswa.</p>
          </div>

          <form class="md:col-span-2" action="{{ route('admin.praktik.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
              <div class="col-span-full">
                <label for="nama_kegiatan" class="block text-sm font-medium leading-6 text-white">Nama Kegiatan / Praktik</label>
                <div class="mt-2">
                  <input id="nama_kegiatan" name="judul" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
                @error('judul')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                @enderror

              </div>

              <div class="col-span-full">
                <label for="deskripsi" class="block text-sm font-medium leading-6 text-white">Deskripsi Kegiatan</label>
                <div class="mt-2">
                  <textarea rows="4" name="deskripsi" id="deskripsi" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"></textarea>
                </div>
                @error('deskripsi')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                @enderror
              </div>

              <div class="col-span-full">
                <label for="pengajar_id" class="block text-sm font-medium leading-6 text-white">Pilihan Pengajar</label>
                <select id="pengajar_id" name="pengajar_id" class="mt-2 block w-full rounded-md border-0 bg-gray-800 p-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6 ">
                    <option selected disabled>Pilih Pengajar</option>
                  @forelse($pengajars as $pengajar)
                    <option value="{{ $pengajar->id }}">{{ $pengajar->user->nama_lengkap }}</option>
                  @empty
                  @endforelse
                </select>
                @error('pengajar_id')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                @enderror
              </div>

              <div class="col-span-full">
                <label for="kelas_id" class="block text-sm font-medium leading-6 text-white">Pilihan Kelas</label>
                <select id="kelas_id" name="kelas_id" class="mt-2 block w-full rounded-md border-0 bg-gray-800 p-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6 ">
                  <option selected disabled>Pilih Kelas & Jurusan</option>
                  @forelse($kelas as $kls)
                    <option value="{{ $kls->id }}">{{ $kls->kelas }} - {{ $kls->jurusan }}</option>
                  @empty
                  @endforelse
                </select>
                @error('kelas_id')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                @enderror
              </div>

              <div class="flex mt-8">
                <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>