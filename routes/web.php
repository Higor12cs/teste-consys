<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Olá";
});

Route::view('/login', 'auth.login')->name('login')->middleware('guest');
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login');

Route::view('/register', 'auth.register')->name('register')->middleware('guest');
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);

    return redirect('/dashboard');
})->name('register');

Route::view('/dashboard', 'dashboard.index')->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout')->middleware('auth');
