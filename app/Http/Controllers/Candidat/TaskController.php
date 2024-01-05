<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    //

    public function tasks(){
        $user = auth()->user();
        $tasks = Task::where('user_id', $user->id)->get();
        return view('candidat.taches.index', compact('tasks'));
    }

    public function addTask(Request $request){
        $task = new Task();
        $task->title = $request->name;
        $task->description = $request->description;
        $task->completed = false;
        $task->user_id = auth()->user()->id;
        $task->start_date = $request->start_date;
        $task->due_date = $request->end_date;
        $task->hour = $request->hour;
        $task->save();

        toast('Tâche ajoutée','success')->autoClose(5000);

        return redirect()->back();
    }

    public function getTask($id){
        $task = Task::find($id);
        return view('candidat.taches.edit', compact('task'));
    }

    public function updateTask(Request $request){
        $task = Task::find($request->task_id);
        $task->title = $request->nom_task;
        $task->description = $request->description;
        $task->completed = $request->status;
        $task->due_date = $request->date_fin;
        $task->start_date = $request->date_debut;
        $task->save();
        toast('Tâche modifiée','success')->autoClose(5000);
        return redirect()->route('candidat.tasks');
    }

    public function completeTask($id){
        $task = Task::find($id);
        $task->completed = true;
        $task->save();
        toast('Tâche terminée','success')->autoClose(5000);
        return redirect()->back();
    }

    public function deleteTask($id){
        $task = Task::find($id);
        $task->delete();

        toast('Tâche supprimée','success')->autoClose(5000);
        return redirect()->back();
    }
}
