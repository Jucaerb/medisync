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

    protected function index()
    {
        return view('boss_nurse.home');
    }

    protected function pending(Request $request)
    {

        $attention = Attention::
        where('attention.date_for', '=', Carbon::now()->format('Y-m-d'))
            ->join('activities', 'attention.user_id', '=', 'activities.id_patient')
            ->join('patients', 'attention.user_id', '=', 'patients.id')
            ->select('attention.id', 'activities.min_permissions', 'attention.activity_name', 'attention.user_id',
                'activities.medicine_id', 'activities.via', 'activities.dose', 'attention.hour', 'patients.name', 'patients.room',
                'activities.observations', 'attention.date_for')
            ->where('attention.status', 'ACTIVE')
            ->get();

        $texto = trim($request->get('texto'));

        $patients = DB::table('patients')
            ->select('id', 'identification', 'name', 'sex', 'birth_date', 'in_date', 'room', 'status')
            ->where('name', 'LIKE', '%' . $texto . '%')
            ->orWhere('identification', 'LIKE', '%' . $texto . '%')
            ->orderBy('name', 'asc')
            ->paginate(8);

        return view('boss_nurse.pending', compact('patients', 'attention', 'texto'));
    }

    protected function attentionModal(Request $request)
    {
        Attention::attetionPatient($request);

        $texto = trim($request->get('texto'));

        return redirect(route('pending'));
    }

    protected function pendingList(Request $request)
    {
        $texto = trim($request->get('texto'));

        $attention = Attention::indexAttention(intval($request->get('filter')), $texto)

        ;

        return view('boss_nurse.pendingList', compact('attention', 'texto'));
    }

    protected function finishedAttention(Request $request)
    {
        $texto = trim($request->get('texto'));
        $attention = Attention::
        where('attention.status', 'INACTIVE')
            ->join('activities', 'attention.user_id', '=', 'activities.id_patient')
            ->join('patients', 'attention.user_id', '=', 'patients.id')
            ->paginate(8);

        return view('boss_nurse.finishedAttention', compact('attention', 'texto'));
    }
}
