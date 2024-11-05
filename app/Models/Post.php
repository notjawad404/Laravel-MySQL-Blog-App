<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

        /**
     * Scope a query to only include posts by a specific user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

     /**
     * Get the title attribute in title case.
     *
     * @param string $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

/**
 * Get the created_at attribute in a formatted "Month name, date, Year" format.
 *
 * @param string $value
 * @return string
 */
public function getCreatedAtAttribute($value)
{
    return \Carbon\Carbon::parse($value)->format('F j, Y, g:i A');
}

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}