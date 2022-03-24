<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['attend_time', 'leave_time'];
    protected $dates = ['attend_time', 'leave_time'];
    
    public function getWorkingMinutesAttribute()
    {
        return $this->leave_time && $this->attend_time ? $this->leave_time->diffInMinutes($this->attend_time) : 0;
    }
}
