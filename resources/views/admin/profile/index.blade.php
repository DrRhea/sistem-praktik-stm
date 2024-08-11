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
    @include('admin.components.alerts')
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative flex justify-center overflow-hidden rounded-xl">
        <div class="divide-y divide-white/5">
          <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
              <h2 class="text-base font-semibold leading-7 text-white">Informasi Pribadi</h2>
              <p class="mt-1 text-sm leading-6 text-gray-400">Masukkan nama lengkap dan email yang sesuai.</p>
            </div>

            <form class="md:col-span-2" action="{{ route('admin.profile.update', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                <div class="flex items-center col-span-full gap-x-8">
                  <img src="{{ $admin->user->foto_profile ? asset('img/photo_profile/' . $admin->user->foto_profile) : asset('img/photo_profile/default.png') }}" alt="" class="flex-none object-cover w-24 h-24 bg-gray-800 rounded-lg">
                  <div>
                    <input type="file" name="foto_profile" id="foto_profile" class="hidden" accept=".png, .jpg, .jpeg">
                    <label for="foto_profile" class="px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-white/10 hover:bg-white/20">Ganti avatar</label>
                    <p class="mt-2 text-xs leading-5 text-gray-400">JPG, GIF atau PNG. Maksimal 2MB. (Opsional)</p>
                  </div>
                  @error('foto_profile')
                  <div class="mt-2">
                    <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                  </div>
                  @enderror
                </div>

                <div class="col-span-full">
                  <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-white">Nama Lengkap</label>
                  <div class="mt-2">
                    <input id="nama_lengkap" name="nama_lengkap" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" value="{{ $admin->user->nama_lengkap }}">
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
                    <input id="email" name="email" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" value="{{ $admin->user->email }}">
                  </div>
                  @error('email')
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
              <h2 class="text-base font-semibold leading-7 text-white">Ganti Kata Sandi</h2>
              <p class="mt-1 text-sm leading-6 text-gray-400">Perbarui kata sandi Anda yang terkait dengan akun Anda.</p>
            </div>

            <form class="md:col-span-2" action="{{ route('admin.profile.updatePassword') }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="current-password" class="block text-sm font-medium leading-6 text-white">Kata Sandi Saat Ini</label>
                  <div class="mt-2">
                    <input id="current-password" name="current_password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                  @error('current_password')
                    <div class="mt-2">
                      <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                    </div>
                  @enderror
                </div>

                <div class="col-span-full">
                  <label for="new-password" class="block text-sm font-medium leading-6 text-white">Kata Sandi Baru</label>
                  <div class="mt-2">
                    <input id="new-password" name="new_password" type="password" autocomplete="new-password" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                  @error('new_password')
                    <div class="mt-2">
                      <p class="ml-2 text-red-500 text-sm font-light">{{ $message }}</p>
                    </div>
                  @enderror
                </div>

                <div class="col-span-full">
                  <label for="confirm-password" class="block text-sm font-medium leading-6 text-white">Konfirmasi Kata Sandi</label>
                  <div class="mt-2">
                    <input id="confirm-password" name="new_password_confirmation" type="password" autocomplete="new-password" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                  @error('new_password_confirmation')
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

{{--          <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">--}}
{{--            <div>--}}
{{--              <h2 class="text-base font-semibold leading-7 text-white">Hapus Akun</h2>--}}
{{--              <p class="mt-1 text-sm leading-6 text-gray-400">Tidak ingin menggunakan layanan kami lagi? Anda dapat menghapus akun Anda di sini. Tindakan ini tidak dapat dibatalkan. Semua informasi terkait akun ini akan dihapus secara permanen.</p>--}}
{{--            </div>--}}

{{--            <form class="flex items-start md:col-span-2">--}}
{{--              <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-red-500 rounded-md shadow-sm hover:bg-red-400">Ya, hapus akun saya</button>--}}
{{--            </form>--}}
{{--          </div>--}}
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>
