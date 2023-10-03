<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Para que los usuarios que no están autenticados, no puedan ver la página principal
    // Esta function __construct() ejecuta el middleware, que te lleva a la página login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
       $ids = auth()->user()->followings->pluck('id')->toArray();

       $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
    //    latest() sirve para ordernar los posts del más nuevo al más viejo.

        return view('home', [
            'posts' => $posts
        ]);
    }

    
}
