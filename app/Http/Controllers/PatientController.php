<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::simplePaginate(5);
        // $patients = Patient::paginate(3);
        return view('patient.patient-list', compact('patients'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.add-patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vallidatedData = $request->validate(
            [
                'name' => 'required',
                'gender' => 'required',
                'dob'=> 'required',
                'age' => 'required',
                'nrc'=>'required',
                'place_of_birth'=>'required',
                'current_address'=>'required',
                'contact_person_name'=> 'required',
                'contact_person_phone'=>'required',
            ],
        );
       Patient::create([
           'is_active'=>1,
           'name' => $request['name'],
           'father_name' => $request['father_name'],
           'dob' => $request['dob'],
           'gender' => $request['gender'],
           'age' => $request['age'],
           'nrc' => $request['nrc'],
           'place_of_birth' => $request['place_of_birth'],
           'current_address' => $request['current_address'],
           'nationality' => $request['nationality'],
           'contact_person_name' => $request['contact_person_name'],
           'contact_person_phone' => $request['contact_person_phone'],
           'created_by' => $request['auth_user_id'],
           'modified_by' => $request['auth_user_id'],
       ]);
       
        return redirect()->back()->with('success', "Patient add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $patient = Patient::find($request->id);
      return view('patient.patientEditForm', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       echo $id = $request['patient_id'];

       $patient = Patient::find($id);
       $patient->name = $request['name'];
       $patient->nrc = $request['nrc'];
       $patient->contact_person_phone = $request['phone'];
       $patient->current_address = $request['address'];
       $patient->gender = $request['gender'];
       $patient->save();
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $patient = Patient::find($request['patient_id']);
        $patient->Delete();
        return back();
    }

    public function showDeletedPatient(){

       $patients = Patient::onlyTrashed()->get();
      foreach($patients as $patient){
          echo $patient->name;
      }
       
    }
}

