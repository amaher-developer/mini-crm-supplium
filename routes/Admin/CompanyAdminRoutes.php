<?php

Route::prefix('admin/company')
    ->middleware(['auth'])
    ->group(function () {
    Route::name('listCompany')
        ->get('/', 'CompanyController@index');
    Route::name('createCompany')
        ->get('create', 'CompanyController@create');
    Route::name('storeCompany')
        ->post('create', 'CompanyController@store');
    Route::name('editCompany')
        ->get('{company}/edit', 'CompanyController@edit');
    Route::name('editCompany')
        ->post('{company}/edit', 'CompanyController@update');
    Route::name('deleteCompany')
        ->get('{company}/delete', 'CompanyController@destroy');
});
