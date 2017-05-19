@extends('layouts.admin')
@section('title')
    Edit Post
@endsection

@section('body')

    welcome from Edit post
    {{--<form method="POST" action="/admin/posts">--}}
    <form method="POST" action="{{route('admin.posts.update',['id'=>$post->id])}}">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <label> Enter title</label>
        <input type="text" name="title" value="{{$post->title}}">
        <br>
        <label> Enter description</label>
        <input type=""text name="description" value="{{$post->description}}">
        <input type="submit" value="Update post" >

    </form>
@endsection
