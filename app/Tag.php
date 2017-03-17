<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    protected $table = 'tag';

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'song_tag');
    }
}
