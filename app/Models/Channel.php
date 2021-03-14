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
        return $this->hasMany( Programming::class );
    }

    function television_services() {
        return $this->belongsToMany(TelevisionService::class);
    }

    function getUrlAttribute() {
        return route('channel-detail',['channel' => $this->id ]);
    }

}
