<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' =>'required|min:11|numeric',
            'datepicker' => 'required'
        ]);

        $res = new Reservation();
        $res->name = $request->name;
        $res->email = $request->email;
        $res->phone = $request->phone;
        $res->date_and_time = $request->datepicker;
        $res->message = $request->message;
        $res->status = false;

        $res->save();
        Toastr::success('You Request Under Processing','Reserve Request');
        return redirect()->back();

    }
}
