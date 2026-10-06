<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sensor extends Model
{
    protected $fillable = [
        'name',
    ];

    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(
            Device::class,
            'device_sensor',
            'sensor_id',
            'device_id'
        )->withTimestamps();
    }

    public function deviceRequests(): HasMany
    {
        return $this->hasMany(DeviceRequest::class);
    }
}
