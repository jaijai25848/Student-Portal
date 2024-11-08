<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

}
