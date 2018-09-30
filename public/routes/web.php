<?php

Route::get('/', function () {
    return view('pages/home');
});



/************** Members routings ****************/

Route::get('members/{action}', "MembersController@getBlade");
Route::get('members/{action}/{schools_id}/{current_page}', "MembersController@getDbActions");
Route::post('members/{action}', "MembersController@postDbActions");


/************** Docs routings ****************/

Route::get('docs/specification', function() {
	return view('pages/docs/specification');
});
Route::get('docs/stepbystep', function() {
	return view('pages/docs/step-by-step');
});


