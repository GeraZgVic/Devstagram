@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection


@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5 border border-gray-800 mb-2">
    <img rel="preload" src="{{asset('img/registrar.jpg')}}" alt="Imagen registro usuarios">
    </div>
    <div class="md:w-4/12 bg-black p-6 rounded-lg shadow-xl border border-gray-800 shadow-gray-700">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    placeholder="Tu Nombre"
                    class="bg-gray-800 text-white border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('name')}}"
                />
                @error('name')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input 
                    type="text" 
                    name="username" 
                    id="username"
                    placeholder="Tu Nombre de Usuario"
                    class="bg-gray-800 text-white  border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{old('username')}}"
                />
                @error('username')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    E-mail
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    placeholder="Ingresa tu email de Registro"
                    class="bg-gray-800 text-white  border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{old('email')}}"
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
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir Password
                </label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation"
                    placeholder="Repite tu Password"
                    class="bg-gray-800 text-white  border p-3 w-full rounded-lg"
                />
            </div>
                <input
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-purple-600 hover:bg-purple-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
        </form>
    </div>
</div>
@endsection