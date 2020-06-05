<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function run($name){
        // dd($name);
        return view('user.index', compact($name));
    }
    public function index(){
        return view('user.index');
    }
    public function getUsers(){
        $users = User::all();
        // dd($users);
        return json_encode($users); 
    }
}
