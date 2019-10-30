<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $res = new Contact();
        $res->name = $request->name;
        $res->email = $request->email;
        $res->subject = $request->subject;
        $res->message = $request->message;
        

        $res->save();
        Toastr::success('You Request To Administator','Contact');
        return redirect()->back();
}

}