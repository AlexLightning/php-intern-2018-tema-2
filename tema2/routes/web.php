<?php

Route::get('/', 'CorpController@index');

Route::get('/companies', 'CorpController@showPage');
Route::get('/companies/create', 'CorpController@create');
Route::post('/companies', 'CorpController@store');
Route::put('companies/{id}','CorpController@update');
Route::delete('companies/{id}','CorpController@destroy');

Route::get('/employees', 'EmplController@showPage');
Route::get('/employees/create', 'EmplController@create');
Route::post('/employees', 'EmplController@store');
Route::put('employees/{id}','EmplController@update');
Route::delete('employees/{id}','EmplController@destroy');
