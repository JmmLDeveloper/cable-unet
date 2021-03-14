<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\InternetService;
use App\Models\TelephoneService;
use App\Models\TelevisionService;


class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'internet_service_id',
        'telephone_service_id',
        'television_service_id',
    ];

    public function internetService()
    {
        return $this->belongsTo(InternetService::class);
    }

    public function telephoneService()
    {
        return $this->belongsTo(TelephoneService::class);
    }

    public function televisionService()
    {
        return $this->belongsTo(TelevisionService::class);
    }

    public function getInternetAttribute()
    {
        return $this->internetService === null ? null : $this->internetService->name;
    }

    public function getTelephoneAttribute()
    {
        return $this->telephoneService === null ? null : $this->telephoneService->name;
    }

    public function getTelevisionAttribute()
    {
        return $this->televisionService === null ? null : $this->televisionService->name;
    }

    public function getUrlAttribute()
    {
        return route('subscriber.package-detail',[ "package" => $this->id ]);
    }
}
