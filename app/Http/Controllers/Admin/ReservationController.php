<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function index(Request $request){
        $reservation = Reservation::all();
        return view('admin.reservation',compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reserv = Reservation::find($id);
        if($reserv->status == false)
        {
            $reserv->status = true;
            $reserv->save();
        }
        Toastr::success('Approves','Reserved');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $reserv = Reservation::find($id)->delete();
        Toastr::success('Delete','Reserved');
        return redirect()->back();

    }
}
