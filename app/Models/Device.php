<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Device extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'user_id',
        'name',
        'data',
        'last_seen_at',
    ];

    protected $casts = [
        'data' => 'array',
        'last_seen_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sensors(): BelongsToMany
    {
        return $this->belongsToMany(
            Sensor::class,
            'device_sensor',
            'device_id',
            'sensor_id'
        )->withTimestamps();
    }
}
