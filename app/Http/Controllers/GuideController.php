<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use App\Models\Tag;
class GuideController extends Controller
{
    public function index() {
        $guides = Guide::all();
        $tags = Tag::all();

        return view('users.admin.guides+tags.guideIndex')->with(['guides' => $guides, 'tags' => $tags]);
    }

    public function create(Request $request) {
        $errors = [];
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $guide = Guide::create([
            'name' => $request->name
        ]);

        foreach ($request->tags as $tag) {
            $guide->addTag(Tag::find($tag));
        }

        $guide->save();

        return redirect('/admin/guides/' . $guide->id);
    }

    public function select(Guide $guide) {
        return view('/users.admin.guides+tags.guide')->with(['guide' => $guide]);
    }

    public function delete(Guide $guide) {
        $guide->delete();

        return redirect('/admin/guides');
    }

    public function userIndex() {
        $guides = Guide::all();

        return view('users.guides.index')->with(['guides' => $guides]);
    }
}
