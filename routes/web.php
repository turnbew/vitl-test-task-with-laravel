<?php

Route::get('/', function () {
    return view('pages/home');
});



/************** Routings of Names pages ****************/

#routing for all blade
Route::get('names/all', ['uses' =>'NamesController@all']);
Route::get('names/all/{page}', ['uses' =>'NamesController@all']);
Route::get('names/all/{page}/{limit}', ['uses' =>'NamesController@all']);

#routing for add blade
Route::get('names/add', ['uses' =>'NamesController@add']);
Route::post('names/add', ['uses' =>'NamesController@add']);

#routing for search blade
Route::get('names/search', function() {
	return view('pages/names/search');
});
Route::post('names/search', ['uses' =>'NamesController@search']);

/************** Docs routings ****************/

Route::get('docs/specification', function() {
	return view('pages/docs/specification');
});
Route::get('docs/stepbystep', function() {
	return view('pages/docs/step-by-step');
});
