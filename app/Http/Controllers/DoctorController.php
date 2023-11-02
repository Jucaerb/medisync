<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Attention;

class DoctorController extends Controller
{

    protected function index() {
        return view('doctor.home');
    }

    protected function patient(Request $request) {
        $texto=trim($request->get('texto'));
        $patients = DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(6);

        return view('doctor.patient', compact('patients', 'texto'));
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

        $texto=trim($request->get('texto'));

        $patients = DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(6);

        return view('doctor.patient', compact('patients', 'texto'));
    }

    protected function activePatient(Request $request){
        Patient::activePatient(intval($request->id));

        $texto=trim($request->get('texto'));

        $patients = DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(6);

        return view('doctor.patient', compact('patients', 'texto'));
    }

    protected function updatedPatient(request $request){
        $patients = Patient::find($request->id);

        return view('doctor.editpatient', [
            'patients' => $patients
        ]);
    }

    protected function saveEdit(Request $request){

        $texto=trim($request->get('texto'));
        $patient = Patient::find($request->patient_id);
        $patient->identification = $request->identification;
        $patient->name = $request->name;
        $patient->sex = $request->sex;
        $patient->birth_date = $request->birth_date;
        $patient->in_date = $request->in_date;
        $patient->room = $request->room;

        $patient->save();

        $patients = DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(6);

        return view('doctor.patient',  compact('patients', 'texto'));
    }

    protected function createActivity() {
        $patients = Patient::all();

        return view('doctor.createactivity', compact('patients'));
    }

    Protected function Activities(Request $request) {

        $texto=trim($request->get('texto'));

        $activities = Activities::indexActivities(intval($request->get('filter')),$texto);

        return view('doctor.activities', compact('activities', 'texto'));
    }

    protected function saveActivity(Request $request) {
        $initialHour = Carbon::parse($request->get('schedule'))->hour;
        switch ($request->get('temporality')){
            case "diary":
                $aux = 24;
                break;
            case "every 4 hours":
                $aux = 4;
                break;
            case "every 8 hours":
                $aux = 8;
                break;
            case "every 12 hours":
                $aux = 12;
                break;
            case "weekly":
                $aux = 168;
                break;
            case "monthly":
                $aux = 730;
                break;
            case "every 2 days":
                $aux = 48;
                break;
            case "every 3 days":
                $aux = 72;
                break;
            case "every 4 days":
                $aux = 96;
                break;
            case "every 5 days":
                $aux = 120;
                break;
            case "every 6 days":
                $aux = 144;
                break;
        }

        $start = Carbon::parse($request->get('create_date'))->addHours($initialHour);
        $end = Carbon::parse($request->get('suspension_date'));
        try {
            $createdActivity = Activities::createActivity($request);
        }catch (\Exception $exception){
            return redirect(route('activities'))->with('error', 'Ocurrió un error al crear la actividad');
        }
        for ($start; $start <= $end; $start->addHour($aux)){
            Attention::create([
                'activity' => $createdActivity->id,
                'activity_name' => $createdActivity->name_activity,
                'user_id' => Auth::user()->id,
                'hour' => $start->hour,
                'date_for' => $start,
                'comments' => 'nn',
                'permissions' => $createdActivity->min_permissions,
                'status' => 'ACTIVE'
            ]);
        }

        return redirect(route('createactivity'))->with('success', 'Actividad creada correctamente');
    }

    protected function updateActivity(Request $request){
        $activities = Activities::find($request->id);

        return view('doctor.editActivity', [
            'activity' => $activities
        ]);
    }

    protected function saveEditActivity(Request $request){

        $texto=trim($request->get('texto'));
        $activities = Activities::find($request->activities_id);
        $activities->name_activity = $request->name_activity;
        $activities->min_permissions = $request->min_permissions;
        $activities->temporality = $request->temporality;
        $activities->schedule = $request->schedule;
        $activities->medicine_id = $request->medicine_id;
        $activities->dose = $request->dose;
        $activities->via = $request->via;
        $activities->create_date = $request->create_date;
        $activities->suspension_date = $request->suspension_date;
        $activities->observations = $request->observations;

        $activities->save();

        $activities = DB::table('activities')
            ->select('id','patient','name_activity','min_permissions','temporality',
                'schedule','medicine_id','dose','via','observations','create_date','suspension_date')
            ->where('name_activity', 'LIKE', '%'.$texto.'%' )
            ->orWhere('min_permissions', 'LIKE', '%'.$texto.'%')
            ->paginate(6);

        return view('doctor.activities', compact('activities', 'texto'));
    }

    protected function deleteActivity(Request $request){
        $activities = Activities::find($request->id);
        $activities->delete();
        return redirect(route('activities', ['filter' => $request->get('filter')]));
    }

    protected function dashboardPatient(Request $request){

        $activities = Activities::all()->groupBy( 'id_patient');

        $texto=trim($request->get('texto'));

        $patients =DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(8);

        return view('doctor.dashboardpatient', compact('patients','activities', 'texto'));
    }
}
