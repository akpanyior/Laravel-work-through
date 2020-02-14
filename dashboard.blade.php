@extends('layouts.app')

@section('content')

   <div class="container">
                        <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                      <img src="{{asset('uploads/avatar/'. Auth::user()->avatar) }}"  style="width: 200px; height:200px; float:left; border-radius:50%; margin-right:30px"><br>
                      <h2>{{ Auth::user()->name }}</h2>
                      <form enctype="multipart/form-data" action="http://localhost:70/upapp/public/dashboard" method="POST">
                        @csrf
                        <div class="center-text">
                        <label>Profile Image</label>
                        </div>
                        <div class="row mt-2">
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                       
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </div>                       
                      </form>
                        </div>
                        </div>
   </div>
                      <div class="container">
                    <br>
                    <div class="float-right mt-4">
                    <a href="http://localhost:70/upapp/public/posts/create" class="btn btn-primary">Create Post</a>
                    </div>
                    <div class="float-left mt-4">
                   <h3>My Uploads</h3>  <br>
                    </div>
                   <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                         @foreach ($posts as $post)
                         <tr>
                            <td><img src="{{asset('storage/files/'.$post->file)}}" style="height:50px"><a href="http://localhost:70/upapp/public/posts/{{$post->id}}"> {{$post->title}}</a></td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a></td>
                            <td>
                                {{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'float-right']) }}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                {!! Form::close()!!}                 
                            </td>
                        </tr>
                         @endforeach
                    </table>
                   
                   
                </div>  
                      </div>  
    
@endsection
