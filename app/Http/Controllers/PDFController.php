<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use \App\Member;

class PDFController extends Controller
{
    public function getPDF(){
        $members= Member::all();
        $pdf=PDF::loadView('pdf.member', ['members' => $members]);
        return $pdf->stream('member.pdf');
    }
}
