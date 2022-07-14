<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Mail;
use App\Models\Preference;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $cards = Card::where('isImage', 0)->paginate(5);
        $preference = Preference::find(1);
        $data = Card::where('isImage', 0)->first();
        return view('admin.index', compact('cards', 'preference', 'data'));
    }

    public function notFound(){
        return abort(404);
    }

    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required|min:8|same:new_password'
        ]);


        $password = User::select('password')->where('id', auth()->user()->id)->first();



        if(Hash::check($request->old_password, $password->password)){

            if(Hash::check($request->new_password, $password->password) == false && Hash::check($request->confirm_password, $password->password) == false){
                $user = User::where('id', auth()->user()->id)->first();
                $user->update([
                    'password' => Hash::make($request->new_passsword)
                ]);

                return back()->with('customMessage', 'Password Changed');
            }

        }

        return back()->with('customMessage', 'Password Error');
    }
}
