<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages()
{
    return [
        'name.required' => 'A "name" is required',
        'memberNo.required'  => 'A "memberNo" is required',
    ];
}
}
