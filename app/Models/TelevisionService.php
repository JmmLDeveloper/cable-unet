<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Channel;

class TelevisionService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tier',
    ];

    public function channels()
    {
        return $this->belongsToMany(Channel::class);
    }
}
