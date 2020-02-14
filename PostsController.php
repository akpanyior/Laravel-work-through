<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Like;

class PostsController extends Controller
{

    
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if($request->hasFile('file')){
          //   $file =$request->file('file');
            // $imagemimes = ['image/png,jpg,jpeg'];
            // $videomimes = ['video/mp4'];
             //$audiomimes = ['audio/mpeg,mp3'];
             //if(in_array($file->getMimeType() ,$imagemimes)){
               //  $filevalidate = 'required|mimes:mpeng';
             //}
        //}
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'file' => 'image|nullable|max:9999'
        ]);

        //handle file
       if($request->hasFile('file')){
        //get filename extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            //get just file name
                 $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
               $extension = $request->file('file')->getClientOriginalExtension();
                 //file name to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;
                 //upload image
                 $path = $request->file('file')->storeAs('public/files', $fileNameToStore);
        } else{
            $fileNameToStore = 'blank.png';
        }

        //create post
        $post =new Post;
        $post->title=$request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->file =$fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //create post
        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        if($post->file != 'noimage.jpg'){
            // delete image
            Storage::delete('public/file/'.$post->file);
        }

        $post->delete();

        return redirect('http://localhost:70/upapp/public/posts')->with('success', 'Successfully deleted!!');
    }
}
