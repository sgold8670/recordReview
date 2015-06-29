@extends ('layout.template')
@section('content')
	<h1>{{ $post->title }}</h1>
    <h2>{{ $post->artist }}</h2>
    <h3>{{ $post->body }}</h3>
@stop




