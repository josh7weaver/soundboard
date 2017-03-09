<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongRating extends Model
{
    protected $table = "song_rating";
    protected $guarded = [];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
