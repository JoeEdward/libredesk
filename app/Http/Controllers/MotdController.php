<?php

namespace App\Http\Controllers;

use App\Models\Motd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class MotdController extends Controller
{
    public function index() {
        $motd = DB::table('motds')->latest()->first();

        return view('users.admin.motd.show')->with(['motd' => $motd]);
    }

    public function create(Request $request) {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'required|image'
        ]);

        $path = Storage::putFile('public', new File($request->img));

        $motd = Motd::create([
           'title' => $request->title,
           'description' => $request->description,
           'img' => Storage::url($path)
        ]);

        $error = [];

        return back()->withErrors($error);

    }

    public function delete(Motd $motd) {
        $motd->delete();

        return back();
    }
}
