<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function store(Request $request){
        return $request;
    }

    public function show($id){
        $mail = Mail::find($id);
        return view('mail.show', compact('mail'));
    }

    public function destroy(Mail $mail){
        $mail->delete();
        return redirect()->route('admin.index')->with('customMessage', 'Mail Deleted');
    }
}
