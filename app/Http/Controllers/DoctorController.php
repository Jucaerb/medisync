<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    protected function index() {
        return view('doctor.home');
    }

    protected function patient() {
        $patient = DB::table('patients')->get();

        return view('doctor.patient', [
            'patient' => $patient
        ]);
    }

    protected function create(){
        return view('doctor.registerPatient');
    }

    protected function save(Request $request){
        try {
            Patient::createPatient($request);
        }catch (\Exception $exception){
            return redirect(route('doctor.registerpatient'))->with('error', 'Ocurrió un error al crear el paciente');
        }

        return redirect(route('doctor.registerpatient'))->with('success', 'Paciente creado correctamente');
    }

    protected function deleted($id){
        $patient = DB::table('patients')->where('id', $id)->delete();

        return view('doctor.registerpatient', [
           'patient' => $patient
        ]);
    }

    protected function updatedPatient(request $request){
        $patient = Patient::find($request->id);

        return view('doctor.editpatient', [
            'patient' => $patient
        ]);
    }

    protected function saveEdit(Request $request){
        $patient = Patient::find($request->patient_id);
        $patient->identification = $request->identification;
        $patient->name = $request->name;
        $patient->sex = $request->sex;
        $patient->birth_date = $request->birth_date;
        $patient->in_date = $request->in_date;
        $patient->room = $request->room;

        $patient->save();

        $patients = DB::table('patients')->get();

        return view('doctor.patient', [
            'patient' => $patients
        ]);
    }
}
