<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'student_id',
        'fee_week_id',
        'amount',
        'paid_at',
        'method',
        'note',
        'created_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function week()
    {
        return $this->belongsTo(FeeWeek::class,'fee_week_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
