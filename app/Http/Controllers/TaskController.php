<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function create()
    {
        $task = new Task();
        $statuses = Status::all();
        $users = User::all();

        return view('task.create', compact('task', 'statuses', 'users'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'executor_uuid' => 'required',
            'name' => 'required|between:3,150',
            'description' => 'required|between:5,300',
            'status' => 'required|between:3,50'
        ]);

        $task = new Task();
        $task->creator_uuid = auth()->id();
        $task->fill($data);
        $task->save();

        return redirect()
            ->route('tasks.index');
    }
    public function index()
    {
        $tasks = Task::paginate(3);
        return view('task.index', compact('tasks'));
    }

    public function edit($uuid)
    {
        $task = Task::findOrFail($uuid);
        $status = Status::all();
        return view('task.edit', compact('task','status'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $uuid)
    {
        $task = Task::findOrFail($uuid);
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $task->fill($data);
        $task->save();
        return redirect()
            ->route('tasks.index');
    }

    public function show($uuid)
    {
        $task = Task::findOrFail($uuid);
        return view('task.show', compact('task'));
    }

    public function destroy($uuid)
    {
        $task = Task::find($uuid);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('tasks.index');
    }
}
