<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Stream extends Model
{
    use HasFactory;

    protected $dates = ['scheduled_start_time'];

    protected $fillable = ['channel_title', 'youtube_id', 'title', 'thumbnail_url', 'scheduled_start_time'];

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('scheduled_start_time', '>', Carbon::yesterday());
    }
}