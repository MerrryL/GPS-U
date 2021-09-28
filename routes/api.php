<?php

use App\Http\Controllers\ConstatationController;
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


//TODO: these are opened for now for dev purposes, remove those not needed
Route::apiResources([
    'constatations' => 'ConstatationController',
    'dossiers' => 'DossierController',
    'images' => 'ImageController',
    'localizations' => 'LocalizationController',
    'observations' => 'ObservationController',
    'observation-default-requests' => 'ObservationDefaultRequestsController',
    'fields' => 'FieldController',
    'field_groups' => 'FieldGroupController',
    'referrings' => 'ReferringController',
    'requests' => 'RequestController'
]);

//Routes to actually upload/delete the media of an image
Route::post('/images/upload/{imageId}', [ImageController::class, 'storeImage']);

//Constatation related supplementary routes
Route::post('/constatations/{constatationId}/defineAThumb', [ConstatationController::class, 'defineAThumb']);
Route::post('/constatations/require_validation/{constatationId}', [ConstatationController::class, 'require_validation']);
Route::post('/constatations/unrequire_validation/{constatationId}', [ConstatationController::class, 'unrequire_validation']);
Route::post('/constatations/validate_constatation/{constatationId}', [ConstatationController::class, 'validate_constatation']);

Route::get('/options', [ConstatationController::class, 'getModels']);

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
//TODO: implement the logic
Route::get('me', function () {
    return User::where(['id' => '1'])->first();
});

//TODO: actually put most of the routes in this middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
});


