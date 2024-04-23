<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Trip extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = [];
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class)->withTrashed();
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class)->withTrashed();
    }
    
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class)->withTrashed();
    }
    public function trela(): BelongsTo
    {
        return $this->belongsTo(Trela::class)->withTrashed();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function tripstatus(): BelongsTo
    {
        return $this->belongsTo(TripStatus::class,'trip_status_id','id')->withTrashed();
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
