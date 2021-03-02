<?php

use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\ConstatationController;
Use App\Http\Controllers\ImageController;
Use App\Http\Controllers\LocalizationController;
Use App\Http\Controllers\ObservationController;
Use App\Http\Controllers\ObservationDefaultRequestController;
Use App\Http\Controllers\ObservationFieldController;
Use App\Http\Controllers\ObserverController;
Use App\Http\Controllers\RequestController;


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

Route::resources([
    'constatation' => ConstatationController::class,
    'dossier' => DossierController::class,
    'image' => ImageController::class,
    'localization' => LocalizationController::class,
    'observation' => ObservationController::class,
    'observation-default-request' => ObservationDefaultRequestController::class,
    'observation-fields' => ObservationFieldController::class,
    'observer' => ObserverController::class,
    'referring' => ReferringController::class,
    'request' => RequestController::class
]);