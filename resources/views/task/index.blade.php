@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
          {{-- @if(count($errors->all()) > 0)
            <div>
              @foreach($errors->all() as $error)
                <div>{{$error}}</div>
            </div>
          @endif --}}
            <button type="button" class="btn btn-success btn-sm m-2" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-plus"></i>
            </button>
            <table class="table table-striped">
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
                    @foreach($tasks as $task)
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
    {{-- Tags --}}
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h1>Tags</h2>
        </div>
        <div class="card-body">
          @foreach($tags as $tag)
          <h3>
            <a href="{{route('tasks.tag', $tag->id)}}" class="text-align-center">
              <span class="badge badge-success">{{$tag->title}}</span>
            </a>
          </h3>
          @endforeach
        </div>
      </div>
      
    </div>
</div>
   <!-------------------------- Modal ------------------------------------>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route('task.store')}}">
            @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Название</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Описание</label>
                  <input type="text" class="form-control" name="description" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Выберите тэг</label>
                  <select multiple  name="tag[]" class="form-control"id="exampleFormControlSelect2">
                    @foreach($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
              </form>
        </div>
        
      </div>
  
    </div>
  </div>


@endsection