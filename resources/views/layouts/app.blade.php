<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
    <title>DevStagram - @yield('titulo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/navbar.js'])
    @livewireStyles

</head>

<body class="bg-black">
    <header class="p-5 border-b border-b-gray-700 bg-black shadow-lg shadow-gray-800">
        <div class="container mx-auto flex justify-between items-center flex-col lg:flex-row">
            <a href="{{ route('home') }}" class="text-3xl font-black text-white">
                <h1>DevStagram</h1>
            </a>
          
            @auth
                <nav class="flex flex-col lg:flex-row gap-2 items-center">
                    <a href="{{ route('posts.create') }}"
                        class="flex items-center gap-2 bg-black p-2
                     text-white hover:text-gray-300 rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="purple" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 
                        7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 
                        00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Crear
                    </a>
                    <a class=" text-white text-sm" href="{{ route('posts.index', auth()->user()->username) }}">
                        <span class="font-bold">Hola: </span> {{ auth()->user()->username }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-white text-sm">
                            Cerrar Sesión</button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class="flex items-center justify-between flex-wrap">
                    <div class="block lg:hidden mt-3 mx-auto">
                        <button id="menu"
                            class="flex items-center justify-center px-3 py-2 border rounded text-white
                            border-purple-600 hover:text-purple-600 hover:border-white">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                    <!-- ITEMS -->
                    <div id="menu-items" class="w-full lg:flex lg:items-center lg:w-auto text-center hidden ">
                        <div class="text-lg lg:flex-grow">
                            <a href="{{ route('login') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 
                            text-white text-sm font-bold hover:text-purple-600 uppercase lg:mr-4">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                                class="block mt-4 lg:inline-block lg:mt-0
                            text-white text-sm font-bold hover:text-purple-600 uppercase lg:mr-4">
                                Crear Cuenta
                            </a>
                        </div>
                    </div>
            </div>
            </nav>
        @endguest
        </div>
    </header>

    <main class="container w-11/12 mx-auto mt-10">
        <h2 class="text-3xl text-white text-center font-bold mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        DevStagram - Todos los derechos Reservados {{ now()->year }}
    </footer>
    @livewireScripts
</body>

</html>
