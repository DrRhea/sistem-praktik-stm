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
    <div class="relative flex justify-center overflow-hidden rounded-xl">
      <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">
        <div>
          <h2 class="text-base font-semibold leading-7 text-white">Ubah Jadwal Mata Pelajaran</h2>
          <p class="mt-1 text-sm leading-6 text-gray-400">Perbarui informasi jadwal mata pelajaran yang ada.</p>
        </div>

        <form class="md:col-span-2" action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
            <div class="col-span-full">
              <label for="nama_praktik" class="block text-sm font-medium leading-6 text-white">Nama Praktik</label>
              <div class="mt-2">
                <input id="nama_praktik" name="judul" type="text" value="{{ $jadwal->judul }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
              </div>
              @error('judul')
              <div class="mt-2">
                <p class="ml-2 text-sm font-light text-red-500">{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="col-span-full">
              <label for="pengajar_id" class="block text-sm font-medium leading-6 text-white">Pilihan Pengajar</label>
              <select id="pengajar_id" name="pengajar_id" class="mt-2 block w-full rounded-md border-0 bg-gray-800 p-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                <option selected disabled>Pilih Pengajar</option>
                @forelse($pengajars as $pengajar)
                  <option value="{{ $pengajar->id }}" {{ $pengajar->id == $jadwal->pengajar_id ? 'selected' : '' }}>{{ $pengajar->user->nama_lengkap }}</option>
                @empty
                  <option disabled>Tidak ada pengajar tersedia</option>
                @endforelse
              </select>
              @error('pengajar_id')
              <div class="mt-2">
                <p class="ml-2 text-sm font-light text-red-500">{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="col-span-full">
              <label for="hari" class="block text-sm font-medium leading-6 text-white">Hari</label>
              <div class="mt-2">
                <input id="hari" name="hari" type="text" value="{{ $jadwal->hari }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
              </div>
              @error('hari')
              <div class="mt-2">
                <p class="ml-2 text-sm font-light text-red-500">{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="col-span-full">
              <label for="jam_mulai" class="block text-sm font-medium leading-6 text-white">Jam Mulai</label>
              <div class="mt-2">
                <input id="jam_mulai" name="jam_mulai" type="text" value="{{ $jadwal->jam_mulai }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
              </div>
              @error('jam_mulai')
              <div class="mt-2">
                <p class="ml-2 text-sm font-light text-red-500">{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="col-span-full">
              <label for="jam_selesai" class="block text-sm font-medium leading-6 text-white">Jam Selesai</label>
              <div class="mt-2">
                <input id="jam_selesai" name="jam_selesai" type="text" value="{{ $jadwal->jam_selesai }}" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
              </div>
              @error('jam_selesai')
              <div class="mt-2">
                <p class="ml-2 text-sm font-light text-red-500">{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="flex mt-8">
              <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

</body>
</html>
