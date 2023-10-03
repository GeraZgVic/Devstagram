@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2 ">
            <img class="border border-gray-800" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">

            <div class="p-3 flex items-center gap-4">
                @auth
                    <livewire:like-post :post="$post"/>
                @endauth
            </div>

            <div>
                <p class="text-white font-bold mb-1">
                    {{ $post->user->username }}
                </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5 text-white">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer" />
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5 ">
            <div class="shadow shadow-gray-700 bg-black p-5 mb-5">
                @auth

                    <p class="text-white text-xl font-bold text-center mb-4">
                        Agrega un Nuevo Comentario
                    </p>

                    @if (session('mensaje'))
                        <div id="mensaje" class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center font-bold uppercase">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-400 font-bold">
                                Añade un Comentario
                            </label>
                            <textarea name="comentario" id="comentario" placeholder="Agrega un comentario"
                                class="border p-3 w-full text-white rounded-lg bg-black @error('name') border-red-500 @enderror" /></textarea>
                            @error('comentario')
                                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-purple-600 hover:bg-purple-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg" />
                    </form>

                @endauth
                <div class="bg-black border border-gray-800  mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-500 border-b">
                                <a class="font-bold text-white" href="{{ route('posts.index', $comentario->user) }}">
                                    {{ $comentario->user->username }}</a>
                                <p class="text-white">{{ $comentario->comentario }}</p>
                                <p class="text-gray-500 text-sm">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center text-gray-300">No Hay Comentarios Aún</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
