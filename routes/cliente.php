<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('cliente')->user();

    //dd($users);

    return view('cliente.home');
})->name('home');

