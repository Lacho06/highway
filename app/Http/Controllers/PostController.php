<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function viewBlog(){
        $posts = Post::paginate(3);
        $preference = Preference::all()->first();

        return view('pages.blog', compact('posts', 'preference'));
    }

    public function viewSinglePost($id){
        $post = Post::find($id);
        $preference = Preference::all()->first();

        return view('pages.single-post', compact('post', 'preference'));
    }


    public function index(){
        $posts = Post::paginate(5);

        return view('post.index', compact('posts'));
    }


    public function create(){
        return view('post.create');
    }

    public function store(PostRequest $request){

        if($request->file('cover_image')){
            $post = Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'text' => $request->text,
                'user_id' => 1
            ]);

            $url = Storage::put('images', $request->file('cover_image'));

            Image::create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
                'url' => $url
            ]);
        }


        return redirect()->route('post.index');
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function show($id){
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    public function updateImage(Request $request){
        $request->validate([
            'post_image' => 'required',
            'post' => 'required'
        ]);

        $post = Post::find($request->post);
        Storage::delete($post->image->url);
        $url = Storage::put('images', $request->file('post_image'));
        $post->image()->update([
            'url' => $url
        ]);

        return back()->with('customMessage', 'Image saved');
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        if($post->image){
            if($post->image->url){
                Storage::delete($post->image->url);
            }

            $url = Storage::put('images', $request->file('cover_image'));

            $post->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'text' => $request->text
            ]);
            $post->image->update([
                'url' => $url
            ]);
        }else{
            $post->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'text' => $request->text
            ]);
        }


        return redirect()->route('post.index')->with('customMessage', 'Updated');
    }

    public function destroy(Post $post){

        if($post->image){
            Storage::delete($post->image->url);
            $post->image()->delete();
        }
        $post->delete();
        // TODO: arreglar el problema con las sesiones y los mensajes, ponerlos flash
        return redirect()->route('post.index')->with('customMessage', 'Deleted');
    }

}
