<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.layout.master');
})->name('home');

Route::resource('vehile','AdminController\VehicleController');

