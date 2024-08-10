<!doctype html>
<html class="h-full bg-gray-900">
<head class="h-full">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HEHE</title>
  @vite('resources/css/app.css')
</head>
<body class="h-full">
<div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
{{--    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=500" alt="Your Company">--}}
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">
      Sistem Jadwal Kegiatan Praktek STM
    </h2>
    <hr class="mt-2">
    <p class="mt-2 text-center text-sm font-medium leading-9 tracking-tight text-white">
      Silakan gunakan kredensial Anda untuk masuk</p>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="POST">
      <div>
        <label for="emaiil" class="block text-sm font-medium leading-6 text-white">Email</label>
        <div class="mt-2">
          <input id="emaiil" name="emaiil" type="text" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading- px-2.5 text-white">Kata Sandi</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required="" class="block w-full rounded-md border-0 bg-white/5 py-1.5 px-2.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Masuk</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-400">
      Belum punya akun?
      <!-- space -->
      <a href="#" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">Daftar disini</a>
    </p>
  </div>
</div>

</body>
</html>