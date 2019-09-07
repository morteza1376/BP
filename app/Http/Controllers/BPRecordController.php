<?php

namespace App\Http\Controllers;

use App\BPRecord;
use App\Patient;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class BPRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bps = BPRecord::paginate(5);
        return view('admin.bp.index', ['bps' => $bps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $now_date = Jalalian::now()->format('%Y/%m/%d');
        return view('admin.bp.create', [
            'patients' => $patients,
            'now_date' => $now_date
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timestamp = Jalalian::fromFormat('Y/m/d', $request->register_date)->getTimestamp();

        $request->merge(['register_date' => $timestamp]);
        // dd($request->all());
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'systolic' => 'required|numeric|between:0,300',
            'diastolic' => 'required|numeric|between:0,300',
            'register_date' => 'required|numeric',
        ]);
        BPRecord::create($validatedData);
        return redirect('/bp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BPRecord  $bPRecord
     * @return \Illuminate\Http\Response
     */
    public function show(BPRecord $bPRecord)
    {
        return view('admin.bp.show', ['bp' => $bPRecord]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BPRecord  $bPRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(BPRecord $bPRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BPRecord  $bPRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BPRecord $bPRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BPRecord  $bPRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(BPRecord $bPRecord)
    {
        //
    }
}
