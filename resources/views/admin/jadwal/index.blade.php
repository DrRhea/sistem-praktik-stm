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

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative overflow-hidden rounded-xl">
        {{-- Placeholder --}}
        <div div class="bg-gray-900">
          <div class="mx-auto max-w-7xl">
            <div class="py-10 bg-gray-900">
              <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                  <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-white">Jadwal Mata Pelajaran </h1>
                    <p class="mt-2 text-sm text-gray-300"></p>
                  </div>
                  <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <button type="button" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-500 rounded-md hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Tambah</button>
                  </div>
                </div>
                <div class="flow-root mt-8">
                  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                      <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                        <tr>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Nama Guru</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">kelas</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Hari</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Jam</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Aksi</th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                        </thead>
                        <!-- benerin ya isinya pak -->
                        <tbody class="divide-y divide-gray-800">
                        @forelse($praktiks as $praktik)
                        <tr>
                          <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                            {{ $praktik->pengajar->user->nama_lengkap }}
                          </td>
                          <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                            {{ $praktik->kelas->kelas }} - {{ $praktik->kelas->jurusan }}
                          </td>
                          <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                            {{ $praktik->judul }}
                          </td>
                          <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                            {{ $praktik->deskripsi }}
                          </td>
                          <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                              <span class="inline-flex rounded-md shadow-sm isolate">
                                <button type="button" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-gray-800 rounded-l-md ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Ubah</button>
                                <button type="submit" class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-semibold text-white bg-gray-800 rounded-r-md ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Hapus</button>
                              </span>
                          </td>
                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>