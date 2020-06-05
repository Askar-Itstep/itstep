@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"><table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">ID-user</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tag->tasks as $task)
                  <tr>
                  <th scope="row">{{$task->id}}</th>
                  <td>{{$task->title}}</td>
                  <td>{{$task->description}}</td>
                  <td>{{$task->user_id}}</td>
                  <td>{{\Carbon\Carbon::parse($task->created_at)->diffForHumans()}}</td>
                  <td>
                  <a href="{{route('task.edit', $task->id)}}"><i class="fa fa-pencil fa-2x text-primary"></i></a>
                  {{-- <form action="{{route('task.delete', $task->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-small">
                      <i class="fa fa-times fa-2x"></i>
                  </form> --}}
                  <a href="{{route('task.delete', $task->id)}}">
                    <i class="fa fa-times fa-2x text-danger"></i>
                  </a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h1>Tags</h2>
        </div>
        <div class="card-body">
          @foreach($tags as $tag)
        <a href="{{route('tasks.tag', $tag->id)}}" class="text-align-center"><span class="badge badge-success">{{$tag->title}}</span></a>
          @endforeach
        </div>
      </div>
      
    </div>
</div>
@endsection