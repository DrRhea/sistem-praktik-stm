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
  @include('pengajar.components.navbar')

  <!-- Desktop Sidebar -->
  @include('pengajar.components.sidebar')

  <!-- Header Sidebar -->
  @include('pengajar.components.header')

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-xl">
          {{-- Placeholder --}}
          <div class="bg-gray-900">
            <div class="mx-auto max-w-7xl">
              <div class="py-10 bg-gray-900">
                <div class="px-4 sm:px-6 lg:px-8">
                  <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                      <h1 class="text-base font-semibold leading-6 text-white">Daftar Kegiatan Praktik</h1>
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
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Siswa</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Kelas</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Kegiatan Praktik</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Nilai</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Beri Nilai</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                          </thead>
                          <tbody>
                            @forelse( $siswa as $s )
                              <tr>
                                <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                                  {{ $loop->iteration }}
                                </td>
                                <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                                  {{ $s->user->nama_lengkap }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                                  {{ $s->kelas->kelas }} - {{ $s->kelas->jurusan }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                                  {{ \App\Models\Praktik::where('kelas_id', $s->kelas->id)->first()->judul }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap">
                                  @if(\App\Models\Nilai::where('siswa_id', $s->id)->first() != null)
                                    {{ \App\Models\Nilai::where('siswa_id', $s->id)->first()->nilai }}
                                  @else
                                    0
                                  @endif
                                </td>
                                <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                                  <span class="inline-flex rounded-md shadow-sm isolate">
                                    <a href="nilai/tambah/{{ $s->id }}" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-gray-800 rounded-md ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Beri Nilai</a>
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
