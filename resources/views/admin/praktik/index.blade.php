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

  <!-- Desktop Sidebar -->
  @include('admin.components.header')

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative overflow-hidden rounded-xl">
        {{-- Placeholder --}}
        <div div class="bg-gray-900">
          <div class="mx-auto max-w-7xl">
            <div class="bg-gray-900 py-10">
              <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                  <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-white">Users</h1>
                    <p class="mt-2 text-sm text-gray-300">A list of all the users in your account including their name, title, email and role.</p>
                  </div>
                  <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <button type="button" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add user</button>
                  </div>
                </div>
                <div class="mt-8 flow-root">
                  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                      <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                        <tr>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Name</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Title</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Email</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Role</th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                        @forelse($praktiks as $praktik)
                        <tr>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                            {{ $praktik->pengajar->user->nama_lengkap }}
                          </td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                            {{ $praktik->kelas->kelas }} - {{ $praktik->kelas->jurusan }}
                          </td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                            {{ $praktik->judul }}
                          </td>
                          <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                            {{ $praktik->deskripsi }}
                          </td>
                          <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                              <span class="isolate inline-flex rounded-md shadow-sm">
                                <button type="button" class="relative inline-flex items-center rounded-l-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Ubah</button>
                                <button type="submit" class="relative -ml-px inline-flex items-center rounded-r-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300/20 hover:bg-gray-900 focus:z-10">Hapus</button>
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