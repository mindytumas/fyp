<?php

namespace App\Http\Controllers;


use Validator;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Member;
use Carbon\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index2()
    {
        
        $members = DB::table('members')->paginate(5);
        return view('membershipdetails', ['members' => $members]);
    }

    public function index1()
    {
        
        $members = DB::table('members')->paginate(5);
        return view('memberStatus', ['members' => $members]);
    }

     public function index()
    {
        
        $members = Member::sortable()->paginate(5);
        return view('index1', ['members' => $members]);
        
        

        //$members = Member::all();
        //return view('member.index', compact('members'));

       
        
        //$members = DB::table('members')->get();
        //return view('dashboard.index', ['members' => $members]);

    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');

    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $members = DB::table('members')->where('name', 'like', '%'.$search. '%')->paginate(5);
        return view('index1', ['members' => $members]);
    }
    public function search1(Request $request)
    {
        $search = $request->get('search');
        $members = DB::table('members')->where('name', 'like', '%'.$search. '%')->paginate(5);
        return view('membershipdetails', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsed
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'memberNo' => 'required|unique:members',
            'nric'  => 'required | unique:members',
            'occupation' => 'required',
            'address' => 'required',
            'phoneNo' => 'required'

        ]);
        if ($validator->fails()) {
            return redirect('memberform')
                        ->withErrors($validator)
                        ->withInput();
        }

        



        $name = $request->get('name');
        $memberNo = $request->get('memberNo');
        $registerDate = $request->get('registerDate');
        $expiredDate = Carbon::parse($registerDate)->addYears(3)->format('Y-m-d');
        $yearOfBorn = $request->get('yearOfBorn');
        $nric = $request->get('nric');
        $occupation = $request->get('occupation');
        $address = $request->get('address'); 
        $phoneNo = $request->get('phoneNo');
        $paymentstatus = $request->get('paymentstatus');
       // $memberstatus = $request->get('paymentstatus');
        {
            if($paymentstatus == 0){
                $memberstatus = 'pending';
                
            }
            elseif($paymentstatus == 1){
                if($expiredDate <= Carbon::now())
                {
                   $memberstatus = 'expired';
                }   
                else{
                    $memberstatus = 'active';
                }
                         
                }    
        }
     
    

        $members = DB::insert('insert into members(name, memberNo, registerDate, expiredDate, yearOfBorn, nric,
        occupation, address, phoneNo, paymentstatus, memberstatus) value(?,?,?,?,?,?,?,?,?,?,?)', [$name, $memberNo, $registerDate, $expiredDate,
        $yearOfBorn, $nric, $occupation, $address, $phoneNo, $paymentstatus,$memberstatus ]);

      
        Session::flash('success', 'Member has been created successfully!');
        return redirect()->route('members.detail');

        //if($members){
           // $red = redirect('members')->with('success', 'Member has been created successfully');

        ///}
        //else{
            //$red = redirect('members/memberform')->with('danger', 'Input data failed, please try again');
       // }
        //return $red;

        //Member::create($request->all());
        //return back();
    }
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $members = DB::select('select * from members where id=?', [$id]);
        return view('show', ['members' => $members]);
        //$mem = Member::where('id', $mem->id);
        //return view('member.index', ['members'=>$mem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = DB::select ('select * from members where id=?', [$id]);
        return view('edit', ['members' => $members]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    


        $name = $request->get('name');
        $memberNo = $request->get('memberNo');
        $yearOfBorn = $request->get('yearOfBorn');
        //$registerDate = $request->get('registerDate');
        $nric = $request->get('nric');
        $occupation = $request->get('occupation');
        $address = $request->get('address');
        $phoneNo = $request->get('phoneNo');
        //$memberstatus = $request->get('memberstatus');
        //$paymentstatus = $request->get('payementstatus');


        $members = DB::update('update members set name=?, memberNo=?, yearOfBorn=?,  nric=?, occupation=?, address=?, phoneNo=?  where id=?',
        [$name, $memberNo, $yearOfBorn,  $nric, $occupation, $address, $phoneNo,   $id ]);


        Session::flash('success', 'Member details has been updated successfully!');
        return redirect()->route('members.detail');


        //$member = Member::findOrFail($request->member_id);

        //$member->update($request->all());
        
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $members = DB::delete('delete from members where id=?', [$id]);
        return redirect()->back()->with('flash_message_success', 'Member has been deleted
            successfully!');

        //$member = Member::findOrFail($request->member_id);
        //$member->delete();

       //return back();
    }
   public function generateReport()
   {
        $members = Member::all();
        return view('generateReport', ['members' => $members]); 
   }

    public function getTotal()
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

    public function pendingmakeactive($id)
    {
            $member = Member::find($id);
            $member->registerDate = Carbon::now();
            $member->expiredDate = Carbon::now()->addYears(3)->format('Y-m-d');
            $member->memberstatus = 'active';
            $member->save();

            Session::flash('success', 'Member status has been activate successfully!');
            return redirect()->back();
        
    }
    public function makeactive($id)
    {
        if($expiredDate <= Carbon::now())
        {
            $member->memberstatus = 'active';
            $member->save();
            return redirect()->back();
        }   
    }
    
    public function notactive($id)
    {
        $member = Member::find($id);
        $member->memberstatus = 'active';
        $member->save();
        return redirect()->back();

    }
    
    public function renew(Request $request, $id)
    {   
        $member = Member::find($id);
        //$member->registerDate = Carbon::now();
        $member->registerDate = $request->get('registerDate');
        
        $registerDate = $request->get('registerDate');
        $member->expiredDate = Carbon::parse($registerDate)->addYears(3)->format('Y-m-d');
        $member->memberstatus = "active";
        $member->save();
        return redirect()->back();

    }
    public function pending($id)
    {
        $member = Member::find($id);
        $member->registerDate = null;
        $member->expiredDate = null;
        $member->save();
        return redirect()->back();
    }
    public function getDate()
    {
        return view('date');

    }

}
