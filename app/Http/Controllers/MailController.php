<?php

namespace App\Http\Controllers;

use App\Mail\ResponseMailable;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function store(Request $request){
        $mail = Mail::find($request->mail);
        FacadesMail::to(env('MAIL_FROM_ADDRESS'))->send(new ResponseMailable($mail));
        return back();
    }

    public function show($id){
        $mail = Mail::find($id);
        return view('mail.show', compact('mail'));
    }

    public function destroy(Mail $mail){
        $mail->delete();
        return redirect()->route('admin.index')->with('customMessage', 'Mail Deleted');
    }

    public function deleteAll(){
        $mails = Mail::all();
        foreach($mails as $mail){
            $mail->delete();
        }

        return back()->with('customMessage', 'All Mails Deleted');
    }

    public function deleteSelected(Request $request){
        $selected = $request->mailsSelected;

        foreach($selected as $i){
            $mailDeleted = Mail::where('id', $i)->first();
            $mailDeleted->delete();
        }
        return back()->with('customMessage', 'Mails Selected Deleted');
    }
}
