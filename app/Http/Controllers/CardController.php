<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function create(){
        return view('card.create');
    }

    public function store(CardRequest $request){
        if($request->file('cover_image')){
            $url = Storage::put('images', $request->file('cover_image'));
            Card::create([
                'title' => $request->title,
                'text' => $request->text,
                'cover_image' => $url
            ]);

            return redirect()->route('admin.index')->with('customMessage', 'Card Created');
        }
        return back();
    }

    public function storeImage(CardRequest $request){

        if($request->file('cover_image')){
            $url = Storage::put('images', $request->file('cover_image'));
            Card::create([
                'title' => $request->title,
                'text' => $request->text,
                'isImage' => true,
                'cover_image' => $url
            ]);
            return redirect()->route('admin.index')->with('customMessage', 'Card Created');
        }
        return back();
    }

    public function show($id){
        $card = Card::find($id);

        return view('card.show', compact('card'));
    }

    public function edit(Card $card){
        return view('card.edit', compact('card'));
    }

    public function update(Request $request, Card $card){
        if($request->cover_image){
            if($card->cover_image){
                Storage::delete($card->cover_image);
            }

            $url = Storage::put('images', $request->file('cover_image'));

            $card->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'cover_image' => $url,
            ]);
        }else{
            $card->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle
            ]);
        }

        return redirect()->route('admin.index')->with('customMessage', 'Card Updated');
    }

    public function updateImage(Request $request, Card $card){
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        if($request->cover_image){
            if($card->cover_image){
                Storage::delete($card->cover_image);
            }

            $url = Storage::put('images', $request->file('cover_image'));

            $card->update([
                'title' => $request->title,
                'text' => $request->text,
                'isImage' => true,
                'cover_image' => $url
            ]);
        }else{
            $card->update([
                'title' => $request->title,
                'isImage' => true,
                'text' => $request->text
            ]);
        }

        return redirect()->route('admin.index')->with('customMessage', 'Card Updated');
    }

    public function destroy(Card $card){
        $card->delete();

        return back()->with('customMessage', 'Card Deleted');
    }

    public function deleteAll(){
        $cards = Card::where('isImage', false)->get();
        foreach($cards as $card){
            $card->delete();
        }

        return back()->with('customMessage', 'All Cards Deleted');
    }
}
