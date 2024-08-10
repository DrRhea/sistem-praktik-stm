<!doctype html>
<html class="h-full bg-gray-900">
<head class="h-full">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HEHE</title>
  @vite('resources/css/app.css')
</head>
<body class="h-full">
  <div class="flex min-h-[900px] flex-col bg-gray-900">
    <div class="flex flex-1 min-h-full">
      <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="w-full max-w-sm mx-auto lg:w-96">
          <div>
            <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-white">Sistem Jadwal Kegiatan Praktek STM</h2>
            <p class="mt-2 text-sm leading-6 text-gray-400">
              Sudah punya akun?
              <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Masuk di sini</a>
            </p>
          </div>

          <div class="mt-10">
            <!-- Error Handling -->
            @if ($errors->any())
            <div class="p-4 mb-4 border border-red-300 rounded-md bg-red-50">
              <div class="flex">
                <div class="ml-3">
                  <h3 class="text-sm font-medium text-red-800">Ada {{ $errors->count() }} kesalahan</h3>
                  <div class="mt-2 text-sm text-red-700">
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

            <div>
              <form action="#" method="POST" class="space-y-6">
                <div>
                  <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-white">Nama Lengkap</label>
                  <div class="mt-2">
                    <input id="nama_lengkap" name="nama_lengkap" type="text" required class="block w-full rounded-md border-0 py-1.5 px-3 bg-white/10 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div>
                  <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 px-3 bg-white/10 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div>
                  <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 px-3 bg-white/10 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div>
                  <label for="password_confirmation" class="block text-sm font-medium leading-6 text-white">Konfirmasi Password</label>
                  <div class="mt-2">
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="block w-full rounded-md border-0 py-1.5 px-3 bg-white/10 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign Up</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-cover w-full h-full" src="https://plus.unsplash.com/premium_photo-1661962510497-9505129083fa?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
      </div>
    </div>
  </div>

</body>
</html>
