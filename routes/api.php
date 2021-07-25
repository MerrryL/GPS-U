<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Validation\ValidationException;

Use App\Http\Controllers\LoginController;

//Use App\Http\Controllers\ConstatationController;
/*Use App\Http\Controllers\ImageController;
Use App\Http\Controllers\LocalizationController;
Use App\Http\Controllers\ObservationController;
Use App\Http\Controllers\ObservationDefaultRequestsController;

Use App\Http\Controllers\ObserverController;
Use App\Http\Controllers\RequestController;*/



/*header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: *');*/


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::apiResources([
    'constatations' => 'ConstatationController',
    'dossiers' => 'DossierController',
    'images' => 'ImageController',
    'localizations' => 'LocalizationController',
    'observations' => 'ObservationController',
    'observation-default-requests' => 'ObservationDefaultRequestsController',
    'field_types' => 'FieldTypeController',
    'field-groups' => 'FieldGroupController',
    'observers' => 'ObserverController',
    'referrings' => 'ReferringController',
    'requests' => 'RequestController'
]);


    // Authentication...
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->middleware(['guest'])
        ->name('login');

    $limiter = config('fortify.limiters.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest',
            $limiter ? 'throttle:'.$limiter : null,
        ]));

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

Route::middleware('auth:sanctum')->group(function() {
   
    //Route::post('login', [LoginController::class, 'authenticate']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('auth:sanctum')->group(function() {
//     // Authentication...
//     Route::get('login', [AuthenticatedSessionController::class, 'create'])
//         ->middleware(['guest'])
//         ->name('login');

//     $limiter = config('fortify.limiters.login');

//     Route::post('login', [AuthenticatedSessionController::class, 'store'])
//         ->middleware(array_filter([
//             'guest',
//             $limiter ? 'throttle:'.$limiter : null,
//         ]));

//     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//         ->name('logout');

// });