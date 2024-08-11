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
  @include('siswa.components.navbar')

  <!-- Desktop Sidebar -->
  @include('siswa.components.sidebar')

  <!-- Header Sidebar -->
  @include('siswa.components.header')

  <main class="py-10 lg:pl-72">
    <!-- Alerts -->
    @include('admin.components.alerts')
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative overflow-hidden rounded-xl">
        {{-- Placeholder --}}
        <div class="bg-gray-900">
          <div class="mx-auto max-w-7xl">
            <div class="py-10 bg-gray-900">
              <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                  <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-white">Jadwal Mata Pelajaran</h1>
                    <p class="mt-2 text-sm text-gray-300"></p>
                  </div>
                  <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-500 rounded-md hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Tambah</a>
                  </div>
                </div>
                <div class="flow-root mt-8">
                  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                      <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                          <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Praktik</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Pengajar</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Hari</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Waktu</th>
                            <!-- <th scope="col" class="px-3 py-3.0 text-center text-sm font-semibold text-white">Aksi</th> -->
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Data Rows (Placeholder) -->
                          <!-- Uncomment and fill in with data if needed -->
                          <!--
                          <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                              Data Praktik
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                              Data Pengajar
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                              Data Hari
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                              Data Waktu
                            </td>
                            <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                              <div class="inline-flex rounded-md shadow-sm isolate">
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-gray-800 rounded-l-md ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Ubah</a>
                                <form action="#" method="POST" class="inline-flex">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-gray-800 rounded-r-md ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Hapus</button>
                                </form>
                              </div>
                            </td>
                          </tr>
                          -->
                          <tr>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap" colspan="6">
                              Belum ada data
                            </td>
                          </tr>
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
