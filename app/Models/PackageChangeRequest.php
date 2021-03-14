<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Package;



class PackageChangeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
    ];


    protected $attributes = [
        'is_active' => true,
    ];


    public function user() {
        return $this->belongsTo( User::class );
    }

    public function package() {
        return $this->belongsTo( Package::class );
    }
}
