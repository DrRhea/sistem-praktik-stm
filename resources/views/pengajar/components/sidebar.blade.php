<div class="hidden shadow-sm lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col shadow-gray-700">
  <!-- Sidebar component, swap this element with another sidebar if you like -->
  <div class="flex flex-col px-6 overflow-y-auto bg-gray-900 grow gap-y-5">
    <div class="flex items-center h-16 shrink-0">
      <!-- Placeholder for header content -->
    </div>
    <nav class="flex flex-col flex-1">
      <ul role="list" class="flex flex-col flex-1 gap-y-7">
        <!-- Jadwal -->
        <li>
          <a href="{{ route('pengajar') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->routeIs('pengajar') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path>
            </svg>
            Dashboard
          </a>
        </li>

        <!-- Profile and Logout -->
        <li class="mt-auto -mx-6">
          <a href="{{ route('pengajar.profile.index') }}" class="flex items-center px-6 py-3 text-sm font-semibold leading-6 text-white gap-x-4 hover:bg-gray-800">
            <img class="w-8 h-8 bg-gray-800 rounded-md object-cover" src="{{ Auth::user()->foto_profile ? asset('img/photo_profile/' . Auth::user()->foto_profile) : asset('img/photo_profile/default.png') }}" alt="">
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
