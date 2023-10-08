<?php

namespace App\Http\Controllers;

use App\Models\Activities;
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
        return view('doctor.registerpatient');
    }

    protected function save(Request $request){
        try {
            Patient::createPatient($request);
        }catch (\Exception $exception){
            return redirect(route('registerpatient'))->with('error', 'Ocurrió un error al crear el paciente');
        }

        return redirect(route('registerpatient'))->with('success', 'Paciente creado correctamente');
    }

    protected function inactivePatient(Request $request){
        Patient::inactivePatient(intval($request->id));

        $patient = DB::table('patients')->get();

        return view('doctor.patient', [
           'patient' => $patient
        ]);
    }

    protected function activePatient(Request $request){
        Patient::activePatient(intval($request->id));

        $patient = DB::table('patients')->get();

        return view('doctor.patient', [
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

    protected function createActivity() {
        return view('doctor.createactivity');
    }

    Protected function Activities() {
        $activities = DB::table('activities')->get(); //CAMBIAR CUANDO FUNCIONE PAGINACION

        return view('doctor.activities', [
            'activities' => $activities
        ]);
    }

    protected function saveActivity(Request $request) {
        try {
            Activities::createActivity($request);
        }catch (\Exception $exception){
            return redirect(route('activities'))->with('error', 'Ocurrió un error al crear la actividad');
        }

        return redirect(route('activities'))->with('success', 'Actividad creado correctamente');
    }

    protected function updateActivity(Request $request){
        $activities = Activities::find($request->id);

        return view('doctor.editactivity', [
            'activity' => $activities
        ]);
    }

    protected function saveEditActivity(Request $request){
        $activities = Activities::find($request->activities_id);
        $activities->patient = $request->patient;
        $activities->name_activity = $request->name_activity;
        $activities->min_permission = $request->min_permission;
        $activities->temporality = $request->temporality;
        $activities->schedule = $request->schedule;
        $activities->medicine_id = $request->medicine_id;
        $activities->dose = $request->dose;
        $activities->via = $request->via;
        $activities->create_date = $request->create_date;
        $activities->suspension_date = $request->suspension_date;
        $activities->observations = $request->observation;

        $activities->save();

        $activities = DB::table('activities')->get();

        return view('doctor.activities', [
            'activity' => $activities
        ]);
    }
}
