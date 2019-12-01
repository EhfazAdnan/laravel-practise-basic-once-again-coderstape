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
Route::view('/','home');
Route::view('about','about');

// contact route for send email 
Route::get('contact','ContactFormController@create');
Route::post('contact','ContactFormController@store');

// passing data through route
Route::get('customers', 'CustomersController@index');
// customer create route
Route::get('customers/create', 'CustomersController@create');
// post data with form
Route::post('customers', 'CustomersController@store');
// customer show route
Route::get('customers/{customer}', 'CustomersController@show');
// customer edit route for edit view
Route::get('customers/{customer}/edit', 'CustomersController@edit');
// update post route for details update
Route::patch('customers/{customer}', 'CustomersController@update');
// delete route
Route::delete('customers/{customer}', 'CustomersController@destroy');

// we can use resource route for all of the routes
// Route::resource('customers','CustomersController');
