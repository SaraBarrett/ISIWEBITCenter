<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function getAllTasks(){

        $tasks = $this->allTasks();

        //dd( $tasks);
        return view('tasks.all_tasks', compact(
            'tasks'
        ));
    }

    protected function allTasks(){

        $tasks = DB::table('tasks')
                ->join('users', 'tasks.user_id','=', 'users.id')
                ->select('tasks.*', 'users.name as resname')
                ->get();

        return $tasks;

    }
}
