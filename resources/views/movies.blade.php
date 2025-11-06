 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
 </head>
 <body>
    <div>
        <h3>Search movies</h3>
        <form action="/search" method="POST">
            @csrf
            <input type="text" placeholder="movie name" name="movie" maxlength="255">
            <button>Search</button>
        </form>
    </div>

    <div>
        <h3>Last five</h3>
        <table>
            <thead>
                <th>Search keyword</th>
                <th>Title found</th>
                <th>imdbID</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                <td>
                    {{$movie['search_key']}}
                </td>
                <td>
                    {{$movie['info']['Title']}}
                </td>
                <td>
                    {{$movie['imdb_id']}}
                </td>
                <td>
                    <a href="/info/{{$movie['imdb_id']}}">info</a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
 </body>
 </html>