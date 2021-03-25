<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

	public function index()
	{
		return view('users.login');
	}

	public function create(Request $request) 
	{

		$validated = $request->validate([
			'email' => 'required|email:rfc,dns|max:255',
			'password' => 'required|max:255'
		]);

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials, $request->remember)) {
			$request->session()->regenerate();

			return redirect()->intended('home');
		}

		return back()->withErrors;

	}

	public function destroy() {
		Auth::logout();

		return redirect()->route('login');
	}
}
