<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeWeek extends Model
{
    protected $fillable = [
        'year',
        'month',
        'week_of_month',
        'start_date',
        'end_date',
        'due_amount',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
}
