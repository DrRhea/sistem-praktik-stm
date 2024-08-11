<div class="hidden shadow-sm lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col shadow-gray-700">
  <!-- Sidebar component, swap this element with another sidebar if you like -->
  <div class="flex flex-col px-6 overflow-y-auto bg-gray-900 grow gap-y-5">
    <div class="flex items-center h-16 shrink-0">
      <!-- Placeholder for header content -->
    </div>
    <nav class="flex flex-col flex-1">
      <ul role="list" class="flex flex-col flex-1 gap-y-7">
<<<<<<< HEAD
<!-- Dashboard -->
        <li>
          <a href="{{ route('admin') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->routeIs('admin') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">

        <!-- Jadwal -->
        <li>
          <a href="{{ route('pengajar') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->routeIs('pengajar') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">

=======
        <!-- Jadwal -->
        <li>
          <a href="{{ route('pengajar') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->routeIs('pengajar') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
>>>>>>> b6955914344b9fc774f56dd72f4dae8605bda43e
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path>
            </svg>
            Dashboard
          </a>
        </li>
<<<<<<< HEAD

        <!-- Praktik -->
        <li>
          <a href="{{ route('admin.praktik.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/praktik*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path>
            </svg>
            Praktik
          </a>
        </li>
        <!-- Kelas -->
        <li>
          <a href="{{ route('admin.kelas.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/kelas*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M21 10h-2V4h1V2H4v2h1v6H3a1 1 0 0 0-1 1v9h20v-9a1 1 0 0 0-1-1zm-7 8v-4h-4v4H7V4h10v14h-3z"></path>
              <path d="M9 6h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2z"></path>
            </svg>
            Kelas
          </a>
        </li>
        <!-- Jadwal -->
        <li>
          <a href="{{ route('admin.jadwal.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/jadwal*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path>
              <path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path>
            </svg>
            Jadwal
          </a>
        </li>
        <!-- Siswa -->
        <li>
          <div class="text-xs font-semibold leading-6 text-gray-400">Siswa</div>
          <ul role="list" class="mt-2 -mx-2 space-y-1">
            <li>
              <a href="{{ route('admin.siswa.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/siswa*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">S</span>
                <span class="truncate">Siswa</span>
              </a>
            </li>
            <!-- Nilai (commented out) -->
            {{-- <li>
              <a href="{{ route('admin.nilai.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/nilai*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">N</span>
                <span class="truncate">Nilai</span>
              </a>
            </li> --}}
          </ul>
        </li>
        <!-- Pengajar -->
        <li>
          <div class="text-xs font-semibold leading-6 text-gray-400">Pengajar</div>
          <ul role="list" class="mt-2 -mx-2 space-y-1">
            <li>
              <a href="{{ route('admin.pengajar.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/pengajar*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">P</span>
                <span class="truncate">Pengajar</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Admin -->
        <li>
          <div class="text-xs font-semibold leading-6 text-gray-400">Admin</div>
          <ul role="list" class="mt-2 -mx-2 space-y-1">
            <li>
              <a href="{{ route('admin.pengajar.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('admin/pengajar*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">A</span>
                <span class="truncate">Admin</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- Profile and Logout -->
        <li class="mt-auto -mx-6">
          <a href="{{ route('admin.profile.index') }}" class="flex items-center px-6 py-3 text-sm font-semibold leading-6 text-white gap-x-4 hover:bg-gray-800">
=======
>>>>>>> b6955914344b9fc774f56dd72f4dae8605bda43e

        <!-- Profile and Logout -->
        <li class="mt-auto -mx-6">
          <a href="{{ route('pengajar.profile.index') }}" class="flex items-center px-6 py-3 text-sm font-semibold leading-6 text-white gap-x-4 hover:bg-gray-800">
<<<<<<< HEAD

=======
>>>>>>> b6955914344b9fc774f56dd72f4dae8605bda43e
            <img class="w-8 h-8 bg-gray-800 rounded-md" src="{{ Auth::user()->foto_profile ? asset('img/photo_profile/' . Auth::user()->foto_profile) : asset('img/photo_profile/default.png') }}" alt="">
            <span class="sr-only">Your profile</span>
            <span aria-hidden="true">{{ ucwords(Auth::user()->nama_lengkap) }}</span>
          </a>
          <form action="{{ route('logout.post') }}" method="POST">
            @csrf
            <button type="submit" class="w-full px-6 py-3 text-sm font-semibold leading-6 text-red-600 gap-x-4 hover:bg-red-500/20">
              <span aria-hidden="true">Keluar</span>
            </button>
          </form>
        </li>
      </ul>
    </nav>
  </div>
</div>
