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
use Spatie\Geocoder\Geocoder;

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
    
    //Constatation related supplementary routes
    Route::get('/constatations/{constatation}/images/{image}/defineAsThumb', [ConstatationImageController::class, 'defineAsThumb']);
    Route::post('/constatations/{constatation}/images/{image}/upload', [ConstatationImageController::class, 'upload']);

    Route::post('/constatations/{constatation}/require_validation', [ConstatationController::class, 'require_validation']);
    Route::post('/constatations/{constatation}/refuse_validation', [ConstatationController::class, 'refuse_validation']);
    Route::post('/constatations/{constatation}/validate_constatation', [ConstatationController::class, 'validate_constatation']);

    Route::post('constatations/{constatationId}/observers', [ConstatationController::class, 'update_observers']);

    Route::get('/options', [ConstatationController::class, 'getModels']);

});

//TODO: these are opened for now for dev purposes, remove those not needed
Route::apiResources([
    'dossiers' => 'DossierController',
    'images' => 'ImageController',
    'followups' => 'FollowupController',
    'localizations' => 'LocalizationController',
    'observations' => 'ObservationController',
    'observation-default-requests' => 'ObservationDefaultRequestsController',
    'fields' => 'FieldController',
    'field_groups' => 'FieldGroupController',
    'referrings' => 'ReferringController',
    'requests' => 'RequestController'
]);



Route::get('/observers', [ObserverController::class, 'index']);



//TODO : make it in a controller
//Geocoding routes
Route::post('getAddressForCoordinates', function (Request $request) {
    $request->validate([
        'lat' => 'required',
        'lng' => 'required'
    ]);

    $client = new \GuzzleHttp\Client([
        'verify' => base_path('cacert.pem'),
    ]);

    $geocoder = new Geocoder($client);
    $geocoder->setApiKey(config('geocoder.key'));
    $geocoder->setLanguage(config('geocoder.language'));
    $geocoder->setRegion(config('geocoder.region'));
    $geocoder->setBounds(config('geocoder.bounds'));

    return $geocoder->getAddressForCoordinates($request['lat'], $request['lng']);
});

Route::post('getCoordinatesForAddress', function (Request $request) {
    $request->validate([
        'formatted_address' => 'required',
    ]);

    $client = new \GuzzleHttp\Client([
        'verify' => base_path('cacert.pem'),
    ]);

    $geocoder = new Geocoder($client);
    $geocoder->setApiKey(config('geocoder.key'));
    $geocoder->setLanguage(config('geocoder.language'));
    $geocoder->setRegion(config('geocoder.region'));
    $geocoder->setBounds(config('geocoder.bounds'));

    return $geocoder->getCoordinatesForAddress($request['formatted_address']);
});


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
//TODO: implement the logic
Route::get('me', function () {
    return User::where(['id' => '1'])->first();
});

//TODO: actually put most of the routes in this middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
});


