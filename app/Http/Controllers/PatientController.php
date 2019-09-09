<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::paginate();
        return view('admin.patient.index')->withPatients($patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'family' => 'required|max:255',
            'gender' => 'required|boolean',
            'phone_number' => 'digits:11',
            'national_code' => 'digits:10',
            'weight' => 'integer|between:10,300',
            'height' => 'integer|between:55,250',
            'is_smoker' => 'boolean',
            'birth_year' => 'integer|between:1290,1398'
        ]);
        Patient::create($validatedData);
        return redirect('/patient')->withErrors($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $bps = $patient->BPS()->orderBy('register_date', 'asc');
        $skip = 0;
        if($bps->count()>12) {
            $skip = $bps->count() -12;
        }
        $all_bps = $bps->skip($skip)->take(12)->get();
        $systolics = [];
        $diastolics = [];
        $dates = [];
        
        foreach ($all_bps as $bp) {
            $systolics[] = $bp->systolic;
            $diastolics[] = $bp->diastolic;
            $dates[] = getJalalianDate($bp->register_date);
        }

        return view('admin.patient.show', [
            'patient' => $patient,
            'systolics' => $systolics,
            'diastolics' => $diastolics,
            'dates' => $dates,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('admin.patient.edit', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'family' => 'required|max:255',
            'gender' => 'required|boolean',
            'phone_number' => 'digits:11',
            'national_code' => 'digits:10|unique:patients,national_code,' . $patient->id,
            'weight' => 'integer|between:10,300',
            'height' => 'integer|between:55,250',
            'is_smoker' => 'boolean',
            'birth_year' => 'integer|between:1290,1398'
        ]);
        $patient->update($validatedData);
        return redirect('/patient')->withErrors($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/patient');
    }
}
