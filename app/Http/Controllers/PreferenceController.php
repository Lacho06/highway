<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreferenceRequest;
use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'main_title' => 'required',
            'main_subtitle' => 'required',
            'main_video' => 'required|file|max:51200',
            'nav_subtitle' => 'required'
        ]);

        return back()->with('customMessage', 'Preferences Created');
    }

    public function update(PreferenceRequest $request, Preference $preference){
        $preference->main_title = $request->main_title;
        $preference->main_subtitle = $request->main_subtitle;
        $preference->nav_subtitle = $request->nav_subtitle;
        if($request->main_video != null){
            $preference->main_video = $request->main_video;
        }

        return back()->with('customMessage', 'Preferences Updated');
    }
}
