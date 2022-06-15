<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*Use App\Http\Controllers\ConstatationController;
Use App\Http\Controllers\ImageController;
Use App\Http\Controllers\LocalizationController;
Use App\Http\Controllers\ObservationController;
Use App\Http\Controllers\ObservationDefaultRequestController;
Use App\Http\Controllers\ObservationFieldController;
Use App\Http\Controllers\RequestController;
Use App\Models\User;*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');

/*Route::get('/user', function () {
    return User::all()->toJson();
});*/

/*Route::resources([
    'constatation' => ConstatationController::class,
    'image' => ImageController::class,
    'localization' => LocalizationController::class,
    'observation' => ObservationController::class,
    'observation-default-request' => ObservationDefaultRequestController::class,
    'observation-fields' => ObservationFieldController::class,
    'referring' => ReferringController::class,
    'request' => RequestController::class
]);*/