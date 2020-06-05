@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('task.update', $data->id)}}">
                        @csrf
                        @method("PUT")
                            <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->title}}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Описание</label>
                            <textarea  class="form-control" name="description" id="exampleInputPassword1">{{$data->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Выберите тэг</label>
                                <select multiple  name="tag[]" class="form-control"id="exampleFormControlSelect2">
                                  @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                            <button type="submit" class="btn btn-primary">Изменить</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    
</div>
    
@endsection