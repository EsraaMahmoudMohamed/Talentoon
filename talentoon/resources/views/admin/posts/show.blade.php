@extends('layouts.admin')
@section('title')
    post show
@endsection

@section('body')

    welcome from show post
    <ul>
      <li>Title:->  {{$post->title}}</li>
      <li> Description:-> {{$post->description}}</li>
      <li>Category:-> {{$category_name}}</li>
      <li>Username:-> {{$user_name}}</li>

    </ul>

@endsection
