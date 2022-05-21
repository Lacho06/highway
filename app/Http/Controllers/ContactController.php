<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailable;
use App\Models\Mail as ModelsMail;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function buy(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $plan = Plan::find($request->message);
        $request->message = $plan->name;
        Mail::to($request->email)->send(new ContactMailable($request->all()));
        ModelsMail::create([
            'name' => $request->name,
            'user_email' => $request->email,
            'message' => $request->message
        ]);
        return back();
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Mail::to($request->email)->send(new ContactMailable($request->all()));
        ModelsMail::create([
            'name' => $request->name,
            'user_email' => $request->email,
            'message' => $request->message
        ]);
        return redirect()->route('index');
    }
}
