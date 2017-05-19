@extends('layouts.admin')
@section('title')
    post show
@endsection

@section('body')

    <table class="table table-striped" border="1">
      <thead>
          <th>title</th><th>Description</th><th  colspan="4">action</th>
      </thead>
      <tbody>
          @foreach ($posts as $post)
          <tr>

                  <td>{{$post->title}}</td>
                  <td>{{$post->description}}</td>
                  <td><a class="btn btn-danger" href="{{route('admin.posts.destroy',$post->id)}}">Delete</a>
                  <a class="btn btn-danger" href="{{route('admin.posts.edit',$post->id)}}">Edit</a></td>

          </tr>
          @endforeach
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
