@extends('layouts.app')

@section('content')
<section class="jumbotron text-center" style="margin-top:-30px; margin-bottom:-40px">
    <img src="{{URL::asset('storage/files/'. $post->file)}}" alt="users image" style="height:100px">
    <div class="container">
      <strong><h1>{{$post->title}}</h1></strong>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section><br><br>
<div class="container">
    <a href="http://localhost:70/upapp/public/posts/" class="btn btn-secondary">Go Back</a>
<div>
    {{$post->body}}
</div>
<div class="center"><br>
    <button onclick=actOnPosts(event); data-post-id="{{$post->id}}">Von</button>
<span id="likes_count-{{$post->id}}">{{$post->likes_count}}</span></div>
<hr>
@if(!AUth::guest())
@if(Auth::user()->id ==$post->user_id)


<a href="http://localhost:70/upapp/public/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'float-right']) }}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!! Form::close()!!}
@endif
@endif
</div>
@endsection