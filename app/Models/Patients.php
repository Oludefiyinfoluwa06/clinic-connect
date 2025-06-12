<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'surname',
        'first_name',
        'other_name',
        'hospital_number',
        'place_of_origin',
        'state',
        'local_government_area',
        'phone_number',
        'address',
    ];

    public function nextOfKin()
    {
        return $this->hasOne(NextOfKins::class, 'patient_id');
    }

    public function vitalSigns()
    {
        return $this->hasOne(VitalSigns::class, 'patient_id');
    }
}
