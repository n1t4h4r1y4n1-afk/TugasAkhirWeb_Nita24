<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'location',
        'event_date',
        'event_time',
        'banner',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
        'status' => 'boolean',
    ];

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}