<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\FilterRequest;
use App\Http\Filters\TaskFilter;
use App\Models\Status;
use App\Models\Tag;
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
        $tags = Tag::all();

        return view('task.create', compact('task', 'statuses', 'users', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'executor_uuid' => 'required',
            'name' => 'required|between:3,150',
            'description' => 'required|between:5,300',
            'status' => 'required|between:3,50',
            'tag' => 'required',
        ]);

        $task = new Task();
        $task->creator_uuid = auth()->id();
        $task->fill($data);
        $task->save();

        $task->tags()->attach($data['tag']);

        return redirect()
            ->route('tasks.index');
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(TaskFilter::class, ['queryParams' => array_filter($data)]);
        $tasks = Task::filter($filter)->paginate(5);

        $statuses = Status::all();

        return view('task.index', compact('tasks', 'statuses'));
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
        $tags = $task->tags()->get();
        return view('task.show', compact('task', 'tags'));
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
