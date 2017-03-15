<?php

namespace App\Http\Controllers;

use App\Song;

class SongApiController extends Controller
{
    public function songCommand()
    {
        $song = Song::inRandomOrder()->first();
        return $song;
    }
}
