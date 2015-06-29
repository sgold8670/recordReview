@extends('master')

@section('content')
	<h1>Create New Record</h1>
    
     @if ($errors->any())
 	<ul class="alert alert-danger">
    	@foreach ($errors->all() as $error)
        	<li>{{ $error }}</li>
        @endforeach
    </ul>
 	@endif
    
    {!! Form::open(['route' => 'posts.store','files'=>true]) !!}
    	<div class="form-group">
        	{!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        	{!! Form::label('artist','Artist') !!}
            {!! Form::text('artist',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        	{!! Form::label('thumbnail','Thumbnail') !!}
            {!! Form::file('thumbnail') !!}
        </div>
        <div class="form-group">
        	{!! Form::label('body','Body') !!}
            {!! Form::textarea('body',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        	{!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>
    
    {!! Form::close() !!}
    
@stop