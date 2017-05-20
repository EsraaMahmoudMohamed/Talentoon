@extends('layouts.admin')
@section('title')
    category show
@endsection

@section('body')

    welcome from show category
    <ul>
      <li>Title:->  {{$news->title}}</li>
      <li> Description:-> {{$news->description}}</li>

    </ul>
@endsection
