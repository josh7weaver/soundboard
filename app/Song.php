<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'song';
    protected $guarded = [];
    public $timestamps = false;

    public function ratings()
    {
        return $this->hasMany(SongRating::class);
    }

    /**
     * Method runs query to fetch the average rating
     * @return float 1 decimal place
     */
    public function fetchAvgRating()
    {
        return number_format($this->ratings()->avg('rating'), 1);
    }

    /**
     * Method assumes ratings were EAGER LOADED
     * @return integer
     */
    public function getAvgRating(){
        if($this->ratings){
            return $this->ratings->avg('rating');
        }
    }
}
