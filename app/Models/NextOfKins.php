<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextOfKins extends Model
{
    protected $fillable = [
        'patient_id',
        'full_name',
        'relationship',
        'phone_number',
        'address',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id');
    }
}
