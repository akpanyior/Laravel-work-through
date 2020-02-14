@extends('layouts.app')

@section('content')
<div class="container">
<h1>Create Post</h1>

        {{ Form::open(['action' => 'PostsController@store', 'method' => 'post', 'enctype'=>'multipart/form-data', 'role' => 'presentation']) }}
         <div class="form-group">
             {{Form::label('title', 'Title')}}
             {{Form::text('title', '', ['class' => 'form-control', 'cols' => 20, 'rows' =>10, 'placeholder' => 'Title'])}}
         </div>
         <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{form::file('file')}}
        </div>
        {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
    
@endsection