<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskRequest;
use Carbon\Carbon;
use App\Tag;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Db::table('tasks')->get();
        $tasks = Task::all();
        $tags = Tag::all();
        Carbon::setLocale('ru');
        //return view('task.index', 'tasks'->toArray());     //1
        //return view('task.index', compact('tasks'))->with(['num'=>5]);    //2
        return view('task.index', compact('tasks', 'tags'));        //3
    }

    public function save(TaskRequest $request){ //DI
        //1)---------------
        // dd($request->toArray());
        // dd($request->get('title'));
        // dd($request->all());

        // date_default_timezone_set('Asia/Almaty');
        // dd(getdate());
        //2)----------------------------------
        // $data = $request->validate(
            // [
            //     'title' => 'required|string|min:3',
            //     'description'=> 'required|string|min:6|max:255'
            // ],
            // [
            //     'title.required' => 'Введите название'б
            //     'description.required'=>'Введите описание'
            // ]
        // );
         //3)----------------
        //  dd(count($request->tag));
        $task = Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id
        ]);
        if(count($request->tag) > 1){
            foreach($request->tag as $tag){
                $task->tags()->attach($tag);
            }
        }else{
            $task->tags()->attach($request->$tag[0]);
        }
        
        
        return redirect()->route('task.index');
    }

    public function edit(Task $id){
        // $task = Task::findOrFail($id);
        $tags = Tag::all();
        return view('task.edit', 
        [
            'data'=>$id//$task
        ])->with('tags',$tags);
    }

    public function update(TaskRequest $request, Task $task){   //$id->$task (+update 'task/edit/{id->task}')
        // dd($request->toArray());
        // $task = Task::find($id);
        // $task->title = $request->title;
        // $task->description = $request->description;
        // $task->save();
        $task->title = $request->title;
        $task->description = $request->description;
        // dd($request->tag);
        if(count($request->tag) > 1){
            foreach($request->tag as $tag){
                $task->tags()->attach($tag);
            }
        }else{
            $task->tags()->attach($request->$tag[0]);
        }
        $task->save();
        return redirect('tasks');
    }

    public function delete($id){    //Task $task
        Task::findOrFail($id)->delete();
        // $task->delete();
        return redirect('tasks');
    }

    public function searchByTag(Tag $tag){  
        // dd($tag->title, $tag->tasks);
        $tasks = $tag->tasks;
        $tags = Tag::all();
        return view('tag.index', compact('tag', 'tags'));
    }
}
