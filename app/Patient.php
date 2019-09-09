<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'family',
        'gender',
        'phone_number',
        'national_code',
        'weight',
        'height',
        'is_smoker',
        'birth_year',
    ];

    public function BPS()
    {
        return $this->hasMany('App\BPRecord');
    }

    public function getBMI() {
        return calculateBMI($this->height, $this->weight);
    }

    public function getGender($lang = 'en')
    {
        $gender = $this->gender;
        return explainGender($gender, $lang);

    }

    public function getShowRoute()
    {
        return route('patient.show',$this->id);
    }

    public function getAge()
    {
        $year = Jalalian::now()->format('Y');
        return $year - $this->birth_year;

    }
    
}
