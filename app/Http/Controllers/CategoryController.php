<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function viewIndex(){
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function index(){
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(CategoryRequest $request){

        if($request->file('cover_image')){
            $url = Storage::put('images', $request->file('cover_image'));
            Category::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'cover_image' => $url
            ]);
        }

        return redirect()->route('category.index');
    }

    public function edit(Category $category){
        return view('category.edit', compact('category'));
    }

    public function show($id){
        $category = Category::find($id);

        return view('category.show', compact('category'));
    }

    public function addImage(Request $request){
        $request->validate([
            'category_image' => 'required',
            'category' => 'required'
        ]);

        $category = Category::find($request->category);

        $url = Storage::put('images', $request->file('category_image'));
        $category->images()->create([
            'url' => $url
        ]);

        return back()->with('customMessage', 'Image saved');
    }

    public function deleteImage(Image $image){
        $category = $image->imageable;
        $image->delete();
        return redirect()->route('category.show', compact('category'))->with('customMessage', 'Deleted');
    }


    public function update(Request $request, Category $category){

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required'
        ]);

        if($request->cover_image){
            if($category->cover_image){
                Storage::delete($category->cover_image);
            }

            $url = Storage::put('images', $request->file('cover_image'));

            $category->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'cover_image' => $url,
            ]);
        }else{
            $category->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle
            ]);
        }


        return redirect()->route('category.index')->with('customMessage', 'Updated');
    }

    public function destroy(Category $category){
        Storage::delete($category->cover_image);
        $category->images()->delete();
        $category->delete();

        return redirect()->route('category.index')->with('customMessage', 'Deleted');
    }

}
