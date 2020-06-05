<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskRequest extends FormRequest
{
    public function authorize(){
        return Auth::check();
    }

    public function rules(){
        return [
            'title' => 'required|string|min:3',
            'description'=> 'required|string|min:6|max:255'
        ];
    }
}




?>