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
                </div>
                <div class="flow-root mt-8">
                  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                      <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                          <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">No.</th>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Praktik</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Pengajar</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Hari</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Waktu</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($jadwal as $jdwl)
                          <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                              {{ $loop->iteration }}
                            </td>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                              {{ $jdwl->praktik->judul }}
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                              {{ $jdwl->praktik->pengajar->user->nama_lengkap }}
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                              {{ $jdwl->hari }}
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                              {{ $jdwl->jam_mulai }} - {{ $jdwl->jam_selesai }}
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap" colspan="6">
                              Belum ada data
                            </td>
                          </tr>
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
