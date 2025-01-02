{{-- <!-- resources/views/components/register-layout.blade.php -->
<div class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-400 via-purple-500 to-pink-600">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        {{ $slot }}
    </div>
</div> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
        <div class="min-h-screen py-40" style="background-image: linear-gradient(115deg,  #aa72aa, #e3d6ff)">
            <div class="container mx-auto">
              <div class="flex flex-col lg:flex-row w-10/12 lg:w-8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden" style="background-image: linear-gradient(115deg,  #aa72aa, #7a65a3)">
                <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center" style="background-image: url('images/toko1.jpg');">
                </div>
                <div class="w-full lg:w-1/2 py-16 px-12">
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg" style="background-image: linear-gradient(115deg, #aa72aa, #4d3a74)">
                        <h2 class="text-black text-3xl mb-4">Register</h2>
                        <p class="text-black mb-4"> 
                            Create your account. It’s free and only take a minute
                        </p>
                        {{ $slot }}
                    </div>
                </div>
              </div>
            </div>
          </div>
          <script type="module" src="/main.js"></script>
    </body>
</html>

