<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Attention;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BossNurseController extends Controller
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
        return view('boss_nurse.home');
    }

    protected function pending(Request $request){

        $attention = Attention::all()->groupBy( 'user_id');

        $texto=trim($request->get('texto'));

        $patients =DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(8);

        return view('boss_nurse.pending', compact('patients', 'attention', 'texto'));
    }

    protected function attentionModal($id, $activity_name) {

        $patients = Patient::find($id);
        $attention = Attention::find($activity_name);
        $activities = Activities::where('id_patient', $id)->get();

        return view('boss_nurse.registerAttention', compact('activities', 'attention', 'patients'));
    }

    Protected function pendingList(Request $request){

        $texto=trim($request->get('texto'));

        $attention = Attention::indexAttention(intval($request->get('filter')), $texto);

        $activities = DB::table('activities')
            ->select('id','patient','name_activity','min_permissions','temporality',
                'schedule','medicine_id','dose','via','observations','create_date','suspension_date')
            ->where('name_activity', 'LIKE', '%'.$texto.'%' )
            ->orWhere('min_permissions', 'LIKE', '%'.$texto.'%')
            ->orderBy('name_activity')
            ->paginate(6);

        $patients =DB::table('patients')
            ->select('id', 'identification','name','sex', 'birth_date','in_date','room','status')
            ->where('name','LIKE', '%'.$texto.'%')
            ->orWhere('identification', 'LIKE', '%'.$texto.'%')
            ->orderBy('name','asc')
            ->paginate(8);

        return view('boss_nurse.pendingList', compact('activities', 'patients','attention', 'texto'));
    }

    public function show($user_id){
        $thisDay = Carbon::now()->format('Y-m-d');

    }
}
