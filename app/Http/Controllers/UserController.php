<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userSelect($id) {
        $user = User::find($id);

        return view('users.select', ['user' => $user]);
    }

    public function userUpdate($id, Request $request) {
        $user = User::find($id);
        $user->firstName = $request->firstname;
        $user->lastName = $request->lastname;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->enabled) {
            $user->enabled = 1;
        }else {
            $user->enabled = 0;
        }
        $user->save();

        $errors = ["User updated!"];

        return back()->withErrors($errors);
    }

    public function userCreate() {
     return view('users.createAdmin');
    }

    public function create(Request $request) {

        $errors = $request->validate([
            $validated = $request->validate([
                'email' => 'required|email:rfc,dns|max:255',
            ])
        ]);


        $user = User::create([
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'email' => $request->email,
            'enabled' => 1,
            'role' => $request->role,
            'year' => $request->year,
            'password' => Hash::make('changeMe'),
        ]);

        $errors = ['User created with password changeMe'];

        return back()->withErrors($errors);
    }

    public function me() {
        return view('users.self');
    }

    public function show() {
        return view('users.loans.profile');
    }

    public function overdue() {
        $overdue = auth()->user()->overDue();
        return view('users.loans.overdue')->with(['overdue' => $overdue]);
    }

    public function readNotif($notification_id) {
        foreach (auth()->user()->unreadNotifications as $notification) {
            if ($notification->id == $notification_id) {
                $notification->markAsRead();
            }
        }
        return '200: OK';

    }

    public function notifIndex() {
        return view('users.loans.notificationsIndex');
    }
}
