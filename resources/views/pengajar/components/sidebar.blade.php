<div class="hidden shadow-sm lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col shadow-gray-700">
  <!-- Sidebar component, swap this element with another sidebar if you like -->
  <div class="flex flex-col px-6 overflow-y-auto bg-gray-900 grow gap-y-5">
    <div class="flex items-center h-16 shrink-0">
      <!-- Placeholder for header content -->
    </div>
    <nav class="flex flex-col flex-1">
      <ul role="list" class="flex flex-col flex-1 gap-y-7">
        <div class="text-xs font-semibold leading-6 text-gray-400">Pengajar</div>
        <li>
          <a href="{{ route('pengajar') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('siswa/jadwal*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path>
              <path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path>
            </svg>
            Jadwal
          </a>
        </li>
        <li>
          <a href="{{ route('pengajar.nilai.index') }}" class="flex p-2 text-sm font-semibold leading-6 {{ request()->is('siswa/nilai*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} rounded-md group gap-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(247, 241, 241, 1);transform: ;msFilter:;"><path d="M21 11h-3V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v14c0 1.654 1.346 3 3 3h14c1.654 0 3-1.346 3-3v-6a1 1 0 0 0-1-1zM5 19a1 1 0 0 1-1-1V5h12v13c0 .351.061.688.171 1H5zm15-1a1 1 0 0 1-2 0v-5h2v5z"></path><path d="M6 7h8v2H6zm0 4h8v2H6zm5 4h3v2h-3z"></path></svg>
            Nilai
          </a>
        </li>
        
        <!-- Profile and Logout -->
        <li class="mt-auto -mx-6">
          <a href="{{ route('pengajar.profile.index') }}" class="flex items-center px-6 py-3 text-sm font-semibold leading-6 text-white gap-x-4 hover:bg-gray-800">
            <img class="object-cover w-8 h-8 bg-gray-800 rounded-md" src="{{ Auth::user()->foto_profile ? asset('img/photo_profile/' . Auth::user()->foto_profile) : asset('img/photo_profile/default.png') }}" alt="">
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
