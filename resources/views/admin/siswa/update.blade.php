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

  <!-- Navbar Mobile -->
  @include('admin.components.navbar')

  <!-- Sidebar Desktop -->
  @include('admin.components.sidebar')

  <!-- Header Desktop -->
  @include('admin.components.header')

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative flex justify-center overflow-hidden rounded-xl">
        <div class="divide-y divide-white/5">
          <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
              <h2 class="text-base font-semibold leading-7 text-white">Informasi Siswa</h2>
              <p class="mt-1 text-sm leading-6 text-gray-400">Masukkan nama lengkap dan email yang sesuai.</p>
            </div>

            <form class="md:col-span-2" method="POST" action="{{ route('admin.siswa.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                <div class="flex items-center col-span-full gap-x-8">
                  <img src="{{ asset('img/photo_profile/default.png') }}" alt="" class="flex-none object-cover w-24 h-24 bg-gray-800 rounded-lg">
                  <div>
                    <input type="file" name="foto_profile" id="foto_profile" class="hidden" accept=".png, .jpg, .jpeg">
                    <label for="foto_profile" class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-white/10 hover:bg-white/20">Ganti avatar</label>
                    <p class="mt-2 text-xs leading-5 text-gray-400">JPG, GIF atau PNG. Maksimal 2MB. (Opsional)</p>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-white">Nama Lengkap</label>
                  <div class="mt-2">
                    <input id="nama_lengkap" name="nama_lengkap" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" value="{{ $siswa->user->nama_lengkap }}">
                  </div>
                  @error('nama_lengkap')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                  @enderror
                </div>

                <div class="col-span-full">
                  <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" value="{{ $siswa->user->email }}">
                  </div>
                  @error('email')
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
                      <option value="{{ $kls->id }}" {{ $kls->id == $siswa->kelas_id ? 'selected' : '' }}>{{ $kls->kelas }} - {{ $kls->jurusan }}</option>
                    @empty
                    @endforelse
                  </select>
                  @error('kelas_id')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                  @enderror
                </div>
              </div>


              <div class="flex mt-8">
                <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Simpan</button>
              </div>
            </form>
          </div>

          <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
              <h2 class="text-base font-semibold leading-7 text-white">Reset Password Siswa</h2>
              <p class="mt-1 text-sm leading-6 text-gray-400">Anda dapat mereset password siswa di sini. Tindakan ini akan mengatur ulang password siswa ke password default yang telah ditentukan. Pastikan untuk memberi tahu siswa tentang password baru.</p>
            </div>

            <form method="POST" action="{{ route('admin.siswa.resetPassword', ['id' => $siswa->id]) }}" class="flex items-start md:col-span-2">
              @csrf
              @method('PATCH')

              <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-400">
                Ya, reset password siswa
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>