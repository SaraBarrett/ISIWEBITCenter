<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function getAllTasks(){

        $tasks = $this->allTasks();

       /* $tasksFromModel = Task::get();

        dd($tasksFromModel);*/

        return view('tasks.all_tasks', compact(
            'tasks'
        ));
    }

    public function viewTask($id){

        $task = Db::table('tasks')
                ->where('tasks.id',$id)
                ->join('users', 'tasks.user_id','=', 'users.id')
                ->select('tasks.*', 'users.name as resname')
                ->first();

        return view('tasks.view_task', compact('task'));
    }

    public function deleteTask($id){

        Db::table('tasks')
                ->where('id',$id)
                ->delete();

        return back();
    }


    protected function allTasks(){

        $tasks = Task::join('users', 'tasks.user_id','=', 'users.id')
                ->select('tasks.*', 'users.name as resname')
                ->get();

        return $tasks;

    }
}
