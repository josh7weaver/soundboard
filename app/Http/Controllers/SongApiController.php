<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class SongApiController extends Controller
{
    public function songCommand(Request $request)
    {
        \Log::info('request', [$request->all()]);
        $song = Song::inRandomOrder()->first();
        return response()->json([
          'response_type' => 'in_channel',
          'text' => $song->youtube_url
        ]);
    }
}
