<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreferenceRequest;
use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PreferenceController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'main_title' => 'required',
            'main_subtitle' => 'required',
            'nav_subtitle' => 'required'
        ]);
        $preference = Preference::all()->first();
        if($preference){

            $preference->update([
                'main_title' => $request->main_title,
                'main_subtitle' => $request->main_subtitle,
                'nav_subtitle' => $request->nav_subtitle
            ]);

        }else{

            Preference::create([
                'main_title' => $request->main_title,
                'main_subtitle' => $request->main_subtitle,
                'nav_subtitle' => $request->nav_subtitle
            ]);

        }

        return back()->with('customMessage', 'Preferences Created');
    }

    public function videoStore(Request $request){
        $preference = Preference::all()->first();
        if($preference){
            if($preference->main_video != null){
                Storage::delete($preference->main_video);
            }
            if($request->file('file')){
                $url = Storage::put('video', $request->file('file'));
                $preference->update([
                    'main_video' => $url
                ]);
            }
        }else{
            if($request->file('file')){
                $url = Storage::put('video', $request->file('file'));
                Preference::create([
                    'main_video' => $url
                ]);
            }
        }
    }

    public function update(PreferenceRequest $request, Preference $preference){
        $preference->update([
            'main_title' => $request->main_title,
            'main_subtitle' => $request->main_subtitle,
            'nav_subtitle' => $request->nav_subtitle
        ]);

        return back()->with('customMessage', 'Preferences Updated');
    }

    public function videoUpdate(Request $request, Preference $preference){
        if($preference->main_video == null){
            if($request->file('file')){
                $url = Storage::put('video', $request->file('file'));
                Preference::create([
                    'main_video' => $url
                ]);
            }
        }else{
            Storage::delete($preference->main_video);
            if($request->file('file')){
                $url = Storage::put('video', $request->file('file'));
                $preference->update([
                    'main_video' => $url
                ]);
            }
        }
    }
}
