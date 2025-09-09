<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nama', 'nis', 'kelas', 'parent_id', 'aktif'];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
