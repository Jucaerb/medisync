<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Attention;
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

        return view('boss_nurse.pending', compact('patients','attention', 'texto'));
    }
}
