<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function create()
    {
        $status = new Status();
        return view('status.create', compact('status'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|between:5,50',
            'code' => 'required|between:5,50',
        ]);

        $status = new Status();
        $status->fill($data);
        $status->save();

        return redirect()
            ->route('index');
    }

    public function index()
    {
        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }

    public function show($uuid)
    {
        $status = Status::findOrFail($uuid);
        return view('status.show', compact('status'));
    }

    public function destroy($uuid)
    {
        $status = Status::find($uuid);
        if ($status) {
            $status->delete();
        }
        return redirect()->route('statuses.index');
    }
}
