<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request) {
        $input = $request->validate([
            'movie' => 'bail|required|string',
        ]);

        $key = config('services.omdbapi.key');

        $response = Http::get('https://www.omdbapi.com/?t=' . $movie . '&apikey=' . $key);

        if (!$response->ok()) {
            return redirect('/');
        }

        $data = json_decode($response->body(), true);

        if ("False" === $data['Response']) {
            return redirect('/');
        }

        Movie::create([
            'search_key' => $movie,
            'imdb_id'    => $data['imdbID'],
            'info'       => $data,
        ]);

        if (5 < count(Movie::all())) {
            $oldest_to_save = Movie::orderByDesc('id')->skip(4)->take(1)->first();
            Movie::where('id', '<', $oldest_to_save->id)->delete();
        }

        return redirect('/');
    }
}
