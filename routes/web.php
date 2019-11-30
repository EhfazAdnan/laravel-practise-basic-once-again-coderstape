<?php

// normal way
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('contact', function(){
//     return view('contact');
// });

// Route::get('about', function(){
//     return view('about');
// });

// shorthand but only get view not pass any data
Route::view('/','welcome');
Route::view('contact','contact');
Route::view('about','about');

// passing data through route
Route::get('customers', 'CustomersController@list');
