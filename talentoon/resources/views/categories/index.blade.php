@extends('layouts.admin')
@section('title')
    categories index
@endsection

@section('body')
dd('test')
    welcome from index
    <ul>
      <li>categories</li>
        @foreach($categories as $category)
            <li>Title:->  {{$category->title}}</li>
            <li> Description:-> {{$category->description}}</li>
               <br>

            <ul>
                <li>All Comments</li>
                <!-- @foreach($category->comments as $comment)
                    <li>Comment:->  {{$comment->content}}</li>

                @endforeach -->
            </ul>
                 @endforeach
              </ul>


@endsection
