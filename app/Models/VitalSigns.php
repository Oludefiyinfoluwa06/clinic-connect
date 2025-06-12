<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSigns extends Model
{
    protected $fillable = [
        'patient_id',
        'temperature',
        'blood_pressure',
        'pulse',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
