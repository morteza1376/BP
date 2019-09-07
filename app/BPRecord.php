<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class BPRecord extends Model
{
    protected $fillable = [
        'patient_id',
        'systolic',
        'diastolic',
        'register_date'
    ];

    public function getJalalianDate()
    {
        return Jalalian::forge($this->register_date)->format('%Y/%m/%d');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
