<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreferenceRequest;
use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreferenceController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'main_title' => 'required',
            'main_subtitle' => 'required',
            'main_video' => 'required|file|max:51200',
            'nav_subtitle' => 'required'
        ]);
        if($request->file('main_video')){
            $url = Storage::put('video', $request->file('main_video'));
            Preference::create([
                'main_title' => $request->main_title,
                'main_subtitle' => $request->main_subtitle,
                'nav_subtitle' => $request->nav_subtitle,
                'main_video' => $url
            ]);
        }
        return back()->with('customMessage', 'Preferences Created');
    }

    public function update(PreferenceRequest $request, Preference $preference){
        if($request->main_video){
            if($preference->main_video){
                Storage::delete($preference->main_video);
            }

            $url = Storage::put('video', $request->file('main_video'));

            $preference->update([
                'main_title' => $request->main_title,
                'main_subtitle' => $request->main_subtitle,
                'nav_subtitle' => $request->nav_subtitle,
                'main_video' => $url,
            ]);
        }else{
            $preference->update([
                'main_title' => $request->main_title,
                'main_subtitle' => $request->main_subtitle,
                'nav_subtitle' => $request->nav_subtitle
            ]);
        }

        return back()->with('customMessage', 'Preferences Updated');
    }
}
