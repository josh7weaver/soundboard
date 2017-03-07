<?php

namespace App\Http\Controllers;

use App\Song;
use App\SongRating;
use Illuminate\Http\Request;

use App\Http\Requests;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all()->sortBy('name');
        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'youtube_url' => 'required'
        ]);

        $song = new Song($request->except('_token'));
        if($song->save()){
            return redirect()->route('song.index')->with('success', 'Saved song successfully');
        } else {
            return redirect()->back()->with('error', "Problem saving new song");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::where('id', $id)->firstOrFail();

        // Get video id and start time from youtube url given
        $queryString = parse_url($song->youtube_url, PHP_URL_QUERY); // extract query string from url
        parse_str($queryString, $params);

        // guard for shorter url format that doesn't have v param
        if(!isset($params['v'])){
            $params['v'] = ltrim(parse_url($song->youtube_url, PHP_URL_PATH), '/');
        }

        // guard if video starts at beginning
        if(!isset($params['t'])){
            $params['t'] = 0;
        }

        $song->view_count++;
        $song->save();

        return view('songs.show', [
            'song' => $song,
            'videoId' => $params['v'],
            'startTime' => $params['t'],
            'songRating' => new SongRating,
            'ratings' => $this->getAllowedRatings(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::where('id', $id)->firstOrFail();
        return view('songs.edit', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'youtube_url' => 'required'
        ]);

        $song = Song::where('id', $id)->firstOrFail();
        $song->fill($request->except('_token'));

        if($song->save()){
            return redirect()->route('song.index')->with('success', 'Saved song successfully');
        } else {
            return redirect()->back()->with('error', "Problem saving new song");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Song::destroy($id)){
            return redirect()->route('song.index')->with('success', 'Deleted song');
        }
        else{
            return redirect()->route('song.index')->with('error', 'Failed to delete song');
        }
    }

    public function editRating($songId)
    {
        $song = Song::where('id', $songId)->firstOrFail();
        return view('ratings.edit', [
            'song' => $song,
            'songRating' => new SongRating,
            'ratings' => $this->getAllowedRatings()
        ]);
    }

    private function getAllowedRatings()
    {
        return array_combine([1,2,3,4,5], [
            '1 (crap)',
            '2',
            '3 (average)',
            '4',
            '5 (gives you tingles)'
        ]);
    }

    public function updateRating(Request $request, $songId)
    {
        $rating = new SongRating([
            'song_id' => $songId,
            'rating' => $request->get('rating'),
        ]);

        if($rating->save()){
            return redirect()->route('song.index')->with('success', "Updated Rating!");
        }
        else {
            return redirect()->back()->with('error', "Failed to save rating.");
        }
    }
}
