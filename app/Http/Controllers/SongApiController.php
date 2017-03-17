<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class SongApiController extends Controller
{
    public function songCommand(Request $request)
    {
        \Log::info('API request: ', [$request->all()]);

        if($searchPhrase = $request->get('text')){
            $type = 'keyword search';
            $searchTerms = explode(' ', $searchPhrase);
            $song = \DB::selectOne('
                SELECT
                    s.*,
                    AVG(sr.rating) as avg_rating
                FROM
                    song_tag st
                JOIN
                    tag t ON t.id = st.tag_id AND t.name like :searchTerm
                JOIN
                    song s ON s.id = st.song_id
                LEFT JOIN
                    song_rating sr ON sr.song_id = s.id
                GROUP BY
                    s.id
                ORDER BY
                    AVG(sr.rating) DESC, RAND()
                LIMIT 1',
            ['searchTerm' => $searchTerms[0]]);

            if(empty($song)){
                $song = Song::inRandomOrder()->first();
                $type = 'random';
            }
        }
        else{
            $song = Song::inRandomOrder()->first();
            $type = 'random';
        }

        return response()->json([
            'response_type' => 'in_channel',
            'text' => $song->youtube_url, //."&autoplay=1",
            'song_name' => $song->name,
            'song_rating' => $song->avg_rating,
            'type' => $type,
        ]);
    }
}
