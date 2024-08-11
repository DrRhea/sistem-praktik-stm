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

  <!-- Desktop Header -->
  @include('admin.components.header')

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
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Nama Admin</th>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Email</th>
                          <th scope="col" class="px-3 py-3.0 text-center text-sm font-semibold text-white">Status</th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                        @forelse($admins as $admin)
                          <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                              {{ $loop->iteration }}
                            </td>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                              {{ $admin->user->nama_lengkap }}
                            </td>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-white whitespace-nowrap sm:pl-0">
                              {{ $admin->user->email }}
                            </td>
                            <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-center whitespace-nowrap sm:pr-0">
                              @if($admin->status == 'pending')
                              <span class="inline-flex rounded-md shadow-sm isolate">
                                <form action="{{ route('admin.approve.terima', ['id' => $admin->id]) }}" method="POST">
                                  @csrf
                                  @method('PATCH')
                                  <button type="submit" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-green-500/50 rounded-l-md ring-1 ring-inset ring-gray-300/20 hover:bg-green-600/50 focus:z-10">Terima</button>
                                </form>
                                <form action="{{ route('admin.approve.tolak', ['id' => $admin->id]) }}" method="POST">
                                  @csrf
                                  @method('PATCH')
                                  <button type="submit" class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-semibold text-white bg-red-500/50 rounded-r-md ring-1 ring-inset ring-gray-300/20 hover:bg-red-600/20 focus:z-10">Tolak</button>
                                </form>
                              </span>
                              @elseif($admin->status == 'diterima')
                                <p class="text-md text-green-500">
                                  {{ ucwords($admin->status) }}
                                </p>
                              @elseif($admin->status == 'ditolak')
                                <p class="text-md text-red-500">
                                  {{ ucwords($admin->status) }}
                                </p>
                              @endif
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td class="px-3 py-4 text-sm text-gray-300 whitespace-nowrap" colspan="7">
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
