@extends('layouts.admin')
@section('title')
    post show
@endsection

@section('body')

    <table class="table table-striped">
      <thead>
          <th>Post title</th><th>Post Description</th><th>action</th>
      </thead>
      <tbody>
          <tr>
                @foreach ($posts as $post)
                  <td>{{$post->title}}</td>
                  <td>{{$post->description}}</td>
                  <td><a class="btn btn-danger" href="{{admin.posts.destroy}}">Delete</a></td>
                @endforeach
          </tr>
      </tbody>
    </table>

          @if(count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

@endsection
