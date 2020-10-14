<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //

    public function index(){
        $tasks = Task::orderBy('created_at','asc')->get();
        return view('task',compact('tasks'));
    }
    
    public function storeTask(Request $request){
        $input = $request->only(['name']);
        $validator = Validator::make($request->all(),[
            'name'=> 'required|max:255',
        ]);
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        Task::create($input);
        return redirect('/');
    }

    public function deleteTask($id){
        //
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}
