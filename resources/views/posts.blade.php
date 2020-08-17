@extends('layouts.main_layout')

@section('content')
  <h1>Posts</h1>
  @foreach ($posts as $post)
    <post-component
    :id = "{{$post -> id}}"
    :title = "'{{$post -> title}}'"
    :text = "'{{$post -> text}}'">
  </post-component>
  @endforeach
@endsection
