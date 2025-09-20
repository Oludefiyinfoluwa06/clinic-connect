<?php

namespace App\Http\Controllers;

use App\Models\NextOfKins;
use App\Models\Patients;
use App\Models\VitalSigns;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patients::with(['nextOfKin', 'vitalSigns'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        return view('app.pages.dashboard.patients.index', compact('patients'));
    }
    public function getPatients()
    {
        $patients = Patients::with(['nextOfKin', 'vitalSigns'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        return json_encode($patients);
    }

    public function create()
    {
        return view('app.pages.dashboard.patients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'surname'               => 'required|string|max:255',
            'first_name'            => 'required|string|max:255',
            'other_name'            => 'nullable|string|max:255',
            'place_of_origin'       => 'nullable|string|max:255',
            'state'                 => 'nullable|string|max:255',
            'local_government_area' => 'nullable|string|max:255',
            'phone_number'          => 'nullable|string|max:20',
            'address'               => 'nullable|string|max:500',
            'full_name'             => 'required|string|max:255',
            'relationship'          => 'required|string|max:100',
            'kin_phone_number'      => 'required|string|max:20',
            'kin_address'           => 'nullable|string|max:500',
            'temperature'           => 'required|numeric',
            'blood_pressure'        => 'required|string|max:20',
            'pulse'                 => 'required|integer',
        ]);

        do {
            $hospital_number = 'NSUK/CLINIC-'.Str::upper(Str::random(6));
        }

        while (Patients::where('hospital_number', $hospital_number)->exists());

        $patient = Patients::create(array_merge($data, [
            'hospital_number' => $hospital_number,
        ]));

        NextOfKins::create([
            'patient_id'   => $patient->id,
            'full_name'    => $data['full_name'],
            'relationship' => $data['relationship'],
            'phone_number' => $data['kin_phone_number'],
            'address'      => $data['kin_address'] ?? null,
        ]);

        VitalSigns::create([
            'patient_id'     => $patient->id,
            'temperature'    => $data['temperature'],
            'blood_pressure' => $data['blood_pressure'],
            'pulse'          => $data['pulse'],
        ]);

        return redirect()
            ->route('patients.index.page')
            ->with('success', 'Patient record created successfully.');
    }

    public function edit(Patients $patient)
    {
        $patient->load(['nextOfKin', 'vitalSigns']);
        return view('app.pages.dashboard.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patients $patient)
    {
        $data = $request->validate([
            'surname'               => 'required|string|max:255',
            'first_name'            => 'required|string|max:255',
            'other_name'            => 'nullable|string|max:255',
            'place_of_origin'       => 'nullable|string|max:255',
            'state'                 => 'nullable|string|max:255',
            'local_government_area' => 'nullable|string|max:255',
            'phone_number'          => 'nullable|string|max:20',
            'address'               => 'nullable|string|max:500',
            'full_name'             => 'required|string|max:255',
            'relationship'          => 'required|string|max:100',
            'kin_phone_number'      => 'required|string|max:20',
            'kin_address'           => 'nullable|string|max:500',
            'temperature'           => 'required|numeric',
            'blood_pressure'        => 'required|string|max:20',
            'pulse'                 => 'required|integer',
        ]);

        $patient->update([
            'surname'               => $data['surname'],
            'first_name'            => $data['first_name'],
            'other_name'            => $data['other_name'] ?? null,
            'place_of_origin'       => $data['place_of_origin'] ?? null,
            'state'                 => $data['state'] ?? null,
            'local_government_area' => $data['local_government_area'] ?? null,
            'phone_number'          => $data['phone_number'] ?? null,
            'address'               => $data['address'] ?? null,
        ]);

        $patient->nextOfKin()->updateOrCreate(
            ['patient_id' => $patient->id],
            [
                'full_name'    => $data['full_name'],
                'relationship' => $data['relationship'],
                'phone_number' => $data['kin_phone_number'],
                'address'      => $data['kin_address'] ?? null,
            ]
        );

        $patient->vitalSigns()->updateOrCreate(
            ['patient_id' => $patient->id],
            [
                'temperature'    => $data['temperature'],
                'blood_pressure' => $data['blood_pressure'],
                'pulse'          => $data['pulse'],
            ]
        );

        return redirect()
            ->route('patients.index.page')
            ->with('success', 'Patient record updated successfully.');
    }

    public function destroy(Patients $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index.page')
            ->with('success', 'Patient record deleted successfully.');
    }
}
