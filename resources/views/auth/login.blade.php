@extends('layouts.app')

@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@push('scripts')
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
@endpush

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5 border border-gray-800 mb-2">
    <img rel="preload" src="{{asset('img/login.jpg')}}" alt="Imagen login usuarios" as="image">
    </div>
    <div class="md:w-4/12 bg-black border border-gray-800 p-6 rounded-lg shadow-xl shadow-gray-800">
        <form acction="{{route('login')}}" method="POST">
            @csrf

            @if(session('mensaje'))
            <p class="my-2 text-white uppercase p-2 rounded-lg text-center
             bg-red-500">
             {{ session('mensaje') }}
            </p>
            @endif

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    E-mail
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    placeholder="Ingresa tu email de Registro"
                    class="bg-gray-800 text-white border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                />
                @error('email')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    placeholder="Password de Registro"
                    class="bg-gray-800 text-white  border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                />
                @error('password')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex items-center mr-4 mb-5">
                <input name="remember" type="checkbox" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label class="ml-2 text-sm font-medium text-white dark:text-gray-300">Mantener mi sesión abierta</label>
            </div>
                <input
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-purple-600 hover:bg-purple-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />  
        </form>
    </div>
</div>
@endsection