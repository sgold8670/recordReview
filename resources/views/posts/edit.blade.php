@extends('layout.template')
@section('content')
	<h1>Edit Record</h1>
    
     @if ($errors->any())
 	<ul class="alert alert-danger">
    	@foreach ($errors->all() as $error)
        	<li>{{ $error }}</li>
        @endforeach
    </ul>
 	@endif
    
    <div class="editForm">
        {!! Form::model($post, ['method'=>'PATCH','route'=>['posts.update',$post->id,'files'=>true]]) !!}
        
        <div class="form-group">
            {!! Form::label('Title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
         <div class="form-group">
            {!! Form::label('Artist',"Artist:") !!}
            {!! Form::text('artist',null,['class'=>'form-control']) !!}
        </div>
        <img src="http://localhost/Test_Site/Laravel/recordReview/public/images/{{ $post->thumbnail}}">
        <div class="form-group">
                {!! Form::label('thumbnail','Thumbnail') !!}
                {!! Form::file('thumbnail',null,['class'=>'form-control']) !!}
            </div>
        
       <div class="form-group">
            {!! Form::label('Body','Review:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update',['class' => 'btn btn-primary'])  !!}
        </div>
        {!! Form::close() !!}
	</div><!-- end of editForm -->
@stop



    
    