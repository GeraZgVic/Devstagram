@extends('layouts.app')

@section('titulo')
Crea una nueva publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush




@section('contenido')
<div 
    class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form 
        action="{{route('imagenes.store')}}"
        method="POST"
        enctype="multipart/form-data" 
        id="dropzone" 
        class=" bg-gray-800 text-gray-400 font-bold dropzone w-full h-96 
        border-dashed border-2 border-violet-500 rounded-lg p-6 
        text-center flex flex-col justify-center items-center">
        @csrf
        </form>
    </div>
    <div class="md:w-1/2 p-10 bg-black rounded-lg shadow-xl shadow-gray-700 mt-10 md:mt-0">
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                    Titulo
                </label>
                <input 
                    type="text" 
                    name="titulo" 
                    id="titulo"
                    placeholder="Tu Titulo"
                    class="bg-gray-800 text-white border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('titulo')}}"
                />
                @error('titulo')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                    Descripción
                </label>
                <textarea  
                    name="descripcion" 
                    id="descripcion"
                    placeholder="Descripción de la publicación"
                    class="bg-gray-800 text-white border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                /> {{old('titulo')}}</textarea>
                @error('descripcion')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input 
                    name="imagen"
                    type="hidden"
                    value="{{old('imagen')}}"
                    />
                    @error('imagen')
                    <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                    @enderror
            </div>


            <input
            type="submit"
            value="Crear Publicación"
            class="bg-purple-600 hover:bg-purple-700 transition-colors cursor-pointer
            uppercase font-bold w-full p-3 text-white rounded-lg"
            />  
              
        </form>
      
    </div>
</div>
@endsection