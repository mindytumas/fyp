<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Member;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_members_active = DB::table('members')->where('memberstatus', '=', 'active')->count();
        $total_members_pending = DB::table('members')->where('memberstatus', '=', 'pending')->count();
        $total_members_expired = DB::table('members')->where('memberstatus', '=', 'expired')->count();
        $total_members = DB::table('members')->count();
        return view('admindashboard')
            ->with(['total'=>$total_members])
            ->with(['total_pending' =>$total_members_pending])
            ->with(['total_expired' =>$total_members_expired])
            ->with(['total_active' =>$total_members_active]);
    }

}
