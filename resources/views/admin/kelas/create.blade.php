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
            <h2 class="text-base font-semibold leading-7 text-white">Tambah Data Jurusan</h2>
            <p class="mt-1 text-sm leading-6 text-gray-400">Tambahkan informasi terbaru mengenai kelas siswa.</p>
          </div>

          <form class="md:col-span-2" action="{{ route('admin.kelas.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
              <div class="col-span-full">
                <label for="jurusan" class="block text-sm font-medium leading-6 text-white">Nama Jurusan</label>
                <div class="mt-2">
                  <input id="jurusan" name="jurusan" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
                @error('jurusan')
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