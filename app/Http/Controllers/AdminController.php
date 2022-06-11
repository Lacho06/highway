<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Mail;
use App\Models\Preference;

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
}
