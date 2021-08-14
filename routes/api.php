<?php

use App\Http\Controllers\ConstatationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\LoginController;
use Spatie\Geocoder\Geocoder;

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

Route::get('/options', [ConstatationController::class, 'getModels']);

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

Route::middleware('auth:sanctum')->post('login', [LoginController::class, 'authenticate']);

Route::post('AdressFromCoordinates', function (Request $request) {
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

Route::middleware('auth:sanctum')->group(function () {




    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
});
