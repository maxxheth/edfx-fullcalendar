<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ideal Image Calendar App')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ assetFromManifest('resources/css/app.css') }}">


    <!-- Livewire Styles -->
    @livewireStyles

    @stack('styles')

    @stack('head_scripts')
</head>
<body class="bg-white">

    <!-- Navigation -->

<nav class="bg-blue-600 text-white p-4" style="background: rgb(247, 246, 244)">
    <div class="container mx-auto flex justify-between">
        <a href="#" class="w-48 text-lg font-bold my-auto"><img src="{{ asset('images/IdealImage_Hor_GoldNavyNoTag.svg') }}" class="w-full"/></a>
        <!-- CTA Buttons -->
        <div class="flex items-center space-x-4">
        <button style="color: white; background: rgb(93, 107, 135); border-radius: 5rem;" class="cursor-pointer rounded-lg border border-blue-500 bg-white px-5 py-2.5 text-center text-sm font-medium text-blue shadow-sm transition-all hover:border-white-700 hover:bg-white-700 focus:ring focus:ring-blue-200" disabled>Master Calendar Export</button>
        <button style="color: white; background: rgb(93, 107, 135); border-radius: 5rem;" class="cursor-pointer rounded-lg border border-blue-500 bg-white px-5 py-2.5 text-center text-sm font-medium text-blue shadow-sm transition-all hover:border-white-700 hover:bg-white-700 focus:ring focus:ring-blue-200" disabled>WTW Export</button>
        <button style="color: white; background: rgb(93, 107, 135); border-radius: 5rem;" class="cursor-pointer rounded-lg border border-blue-500 bg-white px-5 py-2.5 text-center text-sm font-medium text-blue shadow-sm transition-all hover:border-white-700 hover:bg-white-700 focus:ring focus:ring-blue-200" disabled>Forecasts Export</button>
</div>
    </div>
</nav>

    <!-- Main Content -->
    <main class="container mx-auto mt-10 p-4">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white p-4 mt-10">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Ideal Image Development Corp.
            <br>All rights reserved.
            <br>1 North Dale Mabry Hwy, Tampa, FL 33609
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ assetFromManifest('resources/js/app.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

</body>
</html>

