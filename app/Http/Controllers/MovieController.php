<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = $this->movieService->getMovies();
        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = $this->movieService->getDetails('movie', $id);
        return view('movies.show', compact('movie'));
    }
}