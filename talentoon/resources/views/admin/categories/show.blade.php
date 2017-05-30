@extends('layouts.admin')
@section('title')
    post show
@endsection

@section('body')

    welcome from show post
    <ul>
      <li>Title:->  {{$category->title}}</li>
      <li>Image:-> <img src={{asset("/uploads/files/$category->image")}} width="100" height="100" ></li>
    </ul>

@endsection
