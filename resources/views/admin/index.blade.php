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
  @include('pengajar.components.navbar')

  <!-- Desktop Sidebar -->
  @include('pengajar.components.sidebar')

  <!-- Header Sidebar -->
  @include('pengajar.components.header')

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-xl">
          {{-- Placeholder --}}
        </div>
    </div>
  </main>
</div>

</body>
</html>