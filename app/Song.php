<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'song';
    protected $guarded = [];

    public function ratings()
    {
        return $this->hasMany(SongRating::class);
    }

    public static function destroy($ids)
    {
        $ids = is_array($ids) ? $ids : func_get_args();
        SongRating::whereIn('song_id', $ids)
            ->get()
            ->each(function($rating){
                $rating->delete();
            });

        return parent::destroy($ids);
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
