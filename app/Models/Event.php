<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'location', 'banner_image'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
