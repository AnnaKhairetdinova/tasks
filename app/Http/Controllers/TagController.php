<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create()
    {
        $tag = new Tag();
        return view('tag.create', compact('tag'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|between:5,50',
            'description' => 'required|between:5,300',
        ]);

        $tag = new Tag();
        $tag->fill($data);
        $tag->save();

        return redirect()
            ->route('index');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function show($uuid)
    {
        $tag = Tag::findOrFail($uuid);
        return view('tag.show', compact('tag'));
    }

    public function destroy($uuid)
    {
        $tag = Tag::find($uuid);
        if ($tag) {
            $tag->delete();
        }
        return redirect()->route('tags.index');
    }
}
