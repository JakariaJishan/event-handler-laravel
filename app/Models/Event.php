<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use hasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'user_id',
    ];

    protected $casts = [
        'start_time'=>'datetime',
        'end_time'=>'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
