<?php



Route::get('reservations/create', 'ReservationController@create')->name('reservations.create');

Route::post('reservations/create', 'ReservationController@store')->name('reservations.store');
