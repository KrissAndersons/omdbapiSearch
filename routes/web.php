<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('movies', ['movies' => Movie::all()->sortByDesc('id')]);
});

Route::post('/search', [SearchController::class, 'search']);

Route::get('/info', [SearchController::class, 'search']);

Route::get('/info/{imdb_id}', function (string $imdb_id) {
    return view('info', ['movie' => Movie::where('imdb_id', $imdb_id)->first()]);
});
