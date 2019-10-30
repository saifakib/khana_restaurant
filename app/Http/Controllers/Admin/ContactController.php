<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;

class ContactController extends Controller
{
    public function index(Request $request){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();
        Toastr::success('Removed Contact','ContectD');
        return redirect()->back();
    }
}
