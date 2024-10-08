<!doctype html>
<html class="h-full bg-gray-900">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Kegiatan Praktik STM - Login</title>
  @vite('resources/css/app.css')
</head>
<body class="h-full">
  <div class="flex flex-col min-h-screen bg-gray-900">
    <div class="flex flex-1 min-h-full">
      <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        @if(session('warning'))
          <div class="px-4 py-4  sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">

              <div class="p-4 rounded-md bg-yellow-50/5">
                <div class="flex">
                  <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-yellow-500">{{ session('warning') }}</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        @endif
        <div class="w-full max-w-sm mx-auto lg:w-96">
          <div>
{{--            <img class="w-auto h-10" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">--}}
            <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-white">Sistem Jadwal Kegiatan Praktek STM</h2>
            <p class="mt-2 text-sm leading-6 text-gray-400">
              Belum Punya Akun?
              <a href="{{ route('register') }}" class="font-semibold text-indigo-400 hover:text-indigo-300">Daftar di Sini</a>
            </p>
          </div>
  
          <div class="mt-10">
            <div>
              <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                  <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 bg-white/10 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                </div>
  
                <div>
                  <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 px-3 bg-white/10 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                </div>
  
                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Masuk</button>
                </div>
              </form>
            </div>
            <!-- Error Handling -->
            @if ($errors->any())
              <div class="p-4 mt-4 border rounded-md border-red-300/20 bg-red-500/20">
                <div class="flex">
                  <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-400">Ada {{ $errors->count() }} kesalahan</h3>
                    <div class="mt-2 text-sm text-red-400">
                      <ul role="list" class="pl-5 space-y-1 list-disc">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
      <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-cover w-full h-full" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
      </div>
    </div>
  </div>
  
</body>
</html>
