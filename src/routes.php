<?php

/**
 * TODO:
 * [x] Migrate to select2 4.0
 * [x] Make check fields to be toggable from the index
 * [x] Pin validation not working (digits 4)
 * [x] Update validation
 * [x] Configurable route prefix
 * [x] Make the service provider deffered as it doesn't need to be called in the API
 * [] Make visibleWhen (for checkboxes, or type of printers... etc)
 * [] Use the search route into searcher, and pass the search parameter to query instead of a new url path parameter
 * [] Delete validation
 * [] Employee, photo upload...
 * [] ThrustRelationshipController to use the $relationDisplayName instead of `name`
 * [] Make the resource found in app service provider recursive into thrust directory
 * [] Make sortable relationships (right now it uses the relationship name instead of the underling field)
 */

Route::group(['prefix' => config('thrust.routePrefix','thrust'), 'namespace' => 'BadChoice\Thrust\Controllers', "middleware" => ['web' , 'auth']], function(){
    Route::get('{resourceName}/edit/{id}', 'ThrustController@edit')->name('thrust.edit');
    Route::put('{resourceName}/{id}', 'ThrustController@update')->name('thrust.update');
    Route::delete('{resourceName}/{id}', 'ThrustController@delete')->name('thrust.delete');
    Route::get('{resourceName}/search/{search}', 'ThrustController@search')->name('thrust.search');

    Route::get('{resourceName}/{id}/related/{relationship}', 'ThrustRelationshipController@search')->name('thrust.relationship.search');
    Route::get('{resourceName}/{id}/toggle/{field}', 'ThrustActionsController@toggle')->name('thrust.toggle');
});
