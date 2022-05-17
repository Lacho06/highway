<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Mail;
use App\Models\Preference;

class AdminController extends Controller
{
    public function index(){
        $cards = Card::paginate(5);
        $mails = Mail::paginate(5);
        $preference = Preference::find(1);
        $cardImage = Card::where('isImage', true)->first();

        return view('admin.index', compact('cards', 'mails', 'preference', 'cardImage'));
    }
}
