<?php

namespace App\Models;

use App\Models\Programming;

use App\Models\TelevisionService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    function programmings()
    {
        return $this->hasMany(Programming::class);
    }

    function television_services()
    {
        return $this->belongsToMany(TelevisionService::class);
    }

    function getUrlAttribute()
    {
        return route('channel-detail', ['channel' => $this->id]);
    }

    public function getProgrammingsByDay($day_name,$dt = 0)
    {
        $day_names = [
            "sunday" => 0,
            'monday' => 1,
            'tuesday' => 2,
            'wednesday' => 3,
            'thrusday' => 4,
            'friday' => 5,
            'saturday' => 6,
        ];
        $day_number = $day_names[strtolower($day_name)];

        $start_of_day = strval($day_number * 24 - $dt) . ':00:00';
        $end_of_day = strval(24 + $dt + ($day_number * 24)) . ':00:00';


        return $this
            ->programmings()
            ->where('start', '>=', $start_of_day)
            ->where('end', '<=', $end_of_day)
            ->get()
            ->map(function ($programming) use ($day_number) {
                $array1 =  explode(':', $programming->start);
                $h1 = intval($array1[0]) - 24 * $day_number;
                $m1 = $array1[1];
                $s1 = $array1[2];

                $array2 =  explode(':', $programming->end);
                $h2 = intval($array2[0]) - 24 * $day_number;
                $m2 = $array2[1];
                $s2 = $array2[2];

                $programming->start = "$h1:$m1:$s1";
                $programming->end = "$h2:$m2:$s2";

                return $programming;
            });
    }
}
