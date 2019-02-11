<?php

Route::prefix('admin/employ')
    ->middleware(['auth'])
    ->group(function () {
    Route::name('listEmploy')
        ->get('/', 'EmployController@index');
    Route::name('createEmploy')
        ->get('create', 'EmployController@create');
    Route::name('storeEmploy')
        ->post('create', 'EmployController@store');
    Route::name('editEmploy')
        ->get('{employ}/edit', 'EmployController@edit');
    Route::name('editEmploy')
        ->post('{employ}/edit', 'EmployController@update');
    Route::name('deleteEmploy')
        ->get('{employ}/delete', 'EmployController@destroy');
});
