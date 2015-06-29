@extends('layout/template')
@section('content')

<div class="container">

<h1>Record Review</h1>


<p><a href="{{ url('posts/create') }}" class="btn btn-primary">Create A Record Review</a></p>

<table class="table table-bordered table-striped table-hover">
	<thead>
    	<tr>
        	<th>Image</th>
        	<th>Title</th>
            <th>Artist</th>
            <th>Review</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    	@foreach ($posts as $post)
    		<tr>
            	<td><img src="http://localhost/Test_Site/Laravel/recordReview/public/images/{{ $post->thumbnail}}"></td>
            	<td>{{ $post->title }}</td>
                <td>{{ $post->artist }}</td>
                <td>{{ $post->body }}</td>
                <td><a href="{{url('posts',$post->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                     {!! Form::open(['method' => 'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                     {!! Form::close() !!}
            	</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
		 

</div>







