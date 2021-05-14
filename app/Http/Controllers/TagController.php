<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function adminIndex() {
        $tags = Tag::all();

        return view('users.admin.guides+tags.tagIndex')->with(['tags' => $tags]);
    }

    public function add(Request $request) {
        $tag = new Tag();

        $tag->name = $request->input('name');
        $tag->color = $request->input('color');

        $tag->save();

        return back();
    }

    public function select(Tag $tag) {
        return view('users.admin.guides+tags.tagShow')->with(['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag) {
        $tag->name = $request->input('name');
        $tag->color = $request->input('color');

        $tag->save();

        return back();
    }

    public function delete(Tag $tag) {

        $tag->delete();

        return redirect('/admin/tags/');
    }
}
