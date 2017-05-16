@extends('layouts.admin')
@section('title')
    post show
@endsection

@section('body')

    welcome from show post
    <ul>
      <li>Title:->  {{$post->title}}</li>
      <li> Description:-> {{$post->description}}</li>

    </ul>

    <li>All Comments</li>
      @foreach($comments as $comment)
          <li>Comment:->  {{$comment->content}}</li>
               @endforeach
            </ul>




          @if(count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          {{--<form method="POST" action="/posts">--}}
          <form method="POST" action="{{route('comment.store',$post->id)}}">
              {{csrf_field()}}
              <label> Enter comment</label>
              <input type="text" name="content">
              <br>

              <input type="submit" value="comment" >

          </form>
@endsection
