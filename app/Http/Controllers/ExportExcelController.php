<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Excel;

class ExportExcelController extends Controller
{
    public function index()
    {
        $members = DB::table('members')->get();
        return view('generatereport')->with('members', $members);
    }
    public function  excel()
    {
        
            $members = Member::get()->toArray();
            return Excel::create('file1', function($excel) use ($members) {
                $excel->sheet('mySheet', function($sheet) use ($members)
                {
                    $sheet->fromArray($members);
                });
            })->download('xls');
        
}
}