@extends('layouts.admin')
@section('title')
    post show
@endsection

@section('body')

    welcome from show post
    <ul>
      <li>Title:->  {{$category->title}}</li>
      <li> Image:-> {{$category->image}}</li>
    </ul>

@endsection
