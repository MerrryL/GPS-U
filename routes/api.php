<?php

namespace App\Http\Controllers\Constatation;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ObserverController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\LoginController;


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

Route::group(['namespace' => 'Constatation'], function () {
    Route::apiResources([
        'constatations' => 'ConstatationController',
    ]);
    Route::apiResources([
        'constatations.fields' => 'ConstatationFieldController',
        'constatations.images' => 'ConstatationImageController',
        'constatations.localization' => 'ConstatationLocalizationController',
        'constatations.observers' => 'ConstatationObserverController',
    ]);

    // Constatation related supplementary routes
    Route::post('/constatations/{constatation}/require_validation', [ConstatationController::class, 'require_validation']);
    Route::post('/constatations/{constatation}/refuse_validation', [ConstatationController::class, 'refuse_validation']);
    Route::post('/constatations/{constatation}/validate_constatation', [ConstatationController::class, 'validate_constatation']);
    
    // ConstatationImage related supplementary routes
    Route::get('/constatations/{constatation}/images/{image}/defineAsThumb', [ConstatationImageController::class, 'defineAsThumb']);
    Route::post('/constatations/{constatation}/images/{image}/upload', [ConstatationImageController::class, 'upload']);
    Route::delete('/constatations/{constatation}/images/{image}/remove', [ConstatationImageController::class, 'remove']);

    // C
    //Route::post('constatations/{constatationId}/observers', [ConstatationController::class, 'update_observers']);

    Route::get('/options', [ConstatationController::class, 'getModels']);

});

Route::get('/observers', [ObserverController::class, 'index']);

//TODO: these are opened for now for dev purposes, remove those not needed
// Route::apiResources([
//     'dossiers' => 'DossierController',
//     'images' => 'ImageController',
//     'followups' => 'FollowupController',
//     'observations' => 'ObservationController',
//     'observation-default-requests' => 'ObservationDefaultRequestsController',
//     'fields' => 'FieldController',
//     'field_groups' => 'FieldGroupController',
//     'referrings' => 'ReferringController',
//     'requests' => 'RequestController'
// ]);

Route::apiResources([
    'fields' => 'FieldController',
    'field_groups' => 'FieldGroupController',
]);

//Geocoding routes
Route::post('getAddressForCoordinates', [GeoCordinateController::class, 'getAddressForCoordinates']);
Route::post('getCoordinatesForAddress', [GeoCordinateController::class, 'getCoordinatesForAddress']);


//TODO: clean and make sure everything works properly
//Auth and user related routes
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});


Route::post('login', [LoginController::class, 'authenticate']);

Route::post('register', [LoginController::class, 'register']);


//TODO: actually put most of the routes in this middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
        Route::get('me', [LoginController::class, 'me']);
});


