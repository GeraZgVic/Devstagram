@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 border border-gray-800 shadow-md shadow-gray-800 p-6">
        
            <form method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
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
                        value="{{auth()->user()->username}}"
                    />
                    @error('username')
                    <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>
                    <input 
                        type="file" 
                        name="imagen" 
                        id="imagen"
                        class="bg-gray-800 text-white  border p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg, .jepg, .png"
                    />
                </div>
                <input
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-purple-600 hover:bg-purple-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>

        </div>
    </div>

@endsection