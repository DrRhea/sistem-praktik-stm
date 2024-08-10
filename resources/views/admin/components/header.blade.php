<div class="sticky top-0 z-40 flex items-center gap-x-6 bg-gray-900 px-4 py-4 shadow-sm sm:px-6 lg:hidden">
  <button type="button" class="-m-2.5 p-2.5 text-gray-400 lg:hidden" @click="open = true">
    <span class="sr-only">Open sidebar</span>
    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
    </svg>
  </button>
  <div class="flex-1 text-sm font-semibold leading-6 text-white">Dashboard</div>
  <a href="{{ route('admin.profile') }}">
    <span class="sr-only">Your profile</span>
    <img class="h-8 w-8 rounded-full bg-gray-800" src="{{ Auth::user()->foto_profile ? '' : asset('img/photo_profile/default.png') }}" alt="">
  </a>
</div>