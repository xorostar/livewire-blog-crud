<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function viewAll()
    {
        return view('view-all');
    }

    public function unitConverter()
    {
        return view('unitconvert');
    }

    public function converter()
    {
        return view('convert');
    }

    public function api()
    {
        $api_response = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/top_rated');

        $response = json_decode($api_response)->results;
        return view('api', compact('response'));
    }
}
