<div x-show="open" class="relative z-50 lg:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true">

  <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."></div>


  <div class="fixed inset-0 flex">

    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative flex flex-1 w-full max-w-xs mr-16" @click.away="open = false">

      <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Close button, show/hide based on off-canvas menu state." class="absolute top-0 flex justify-center w-16 pt-5 left-full">
        <button type="button" class="-m-2.5 p-2.5" @click="open = false">
          <span class="sr-only">Close sidebar</span>
          <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-col px-6 pb-2 overflow-y-auto bg-gray-900 grow gap-y-5 ring-1 ring-white/10">
        <div class="flex items-center h-16 shrink-0">

        </div>
        <nav class="flex flex-col flex-1">
          <ul role="list" class="flex flex-col flex-1 gap-y-7">
            <li>
              <ul role="list" class="-mx-2 space-y-1">
                <li>
                  <a href="{{ route('pengajar') }}" class="flex p-2 text-sm font-semibold leading-6 text-white bg-gray-800 rounded-md group gap-x-3" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-800 text-white&quot;, Default: &quot;text-gray-400 hover:text-white hover:bg-gray-800&quot;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg>
                    Jadwal
                  </a>
                </li>
                <li>
                  <a href="{{ route('pengajar.nilai.index') }}" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md hover:text-white hover:bg-gray-800 group gap-x-3" x-state-description="undefined: &quot;bg-gray-800 text-white&quot;, undefined: &quot;text-gray-400 hover:text-white hover:bg-gray-800&quot;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path></svg>
                    Nilai
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <form action="{{ route('logout.post') }}" method="POST">
                @csrf
                <button type="" class="w-full px-6 py-3 text-sm font-semibold leading-6 text-red-600 rounded-lg gap-x-4 bg-red-500/20 hover:bg-red-500/10">
                  <span aria-hidden="true">Keluar</span>
                </button>
              </form>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>

  </div>
</div>