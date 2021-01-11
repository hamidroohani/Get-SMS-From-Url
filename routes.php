<?php

use Illuminate\Support\Facades\Route;

Route::get('/forward-url/save-sms','ForwardUrlController@saveSms')->name('forward-url.save-sms');
