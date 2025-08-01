<?php

use App\Http\Controllers\Auth\AdminAuth\AdminLoginController;
use App\Http\Controllers\Auth\AdminAuth\AdminRegisterController;
use App\Http\Controllers\Auth\UserAuth\UserAuthController;
use App\Http\Controllers\BusConfig\AddBus\AddBusController;
use App\Http\Controllers\BusConfig\AddSeats\NormalSeat_SS_Controller;
use App\Http\Controllers\BusConfig\Amenities\AmenitiesController;
use App\Http\Controllers\BusConfig\BusLocation\BusLocationController;
use App\Http\Controllers\BusConfig\BusRouteInfo\BusRouteInfo;
use App\Http\Controllers\Orders\OrderRealTime\ViewSeatConfigs;
use App\Http\Controllers\Orders\BookingRealTime\BookingController;
use App\Http\Controllers\Orders\OrderRealTime\OrderRealTimeController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');






Route::post('/admin-register', [AdminRegisterController::class, 'adminRegister']);



Route::post('/user-register', [AdminRegisterController::class, 'userRegister']);

// location master work is done 
Route::get('/verify-location', [BusLocationController::class, 'verifyLocation']);
Route::post('/add-location', [BusLocationController::class, 'addLocation']);
Route::get('/view-location', [BusLocationController::class, 'viewLocation']);
// ends here



// amenties master route starts here
Route::post('/add-amenity', [AmenitiesController::class, 'addAmenity']);
// ends here



// bus adding master route starts here
Route::post('/add-bus', [AddBusController::class, 'addBus']);
// ends here


Route::post('/add-seat', [NormalSeat_SS_Controller::class, 'addSeat']);



Route::post('/create-order', [OrderRealTimeController::class, 'createOrder']);
Route::get('/generate-link', [OrderRealTimeController::class, 'generateLink']);
Route::post('/payment-status-callback', [OrderRealTimeController::class, 'paymentStatus']);
Route::post('/create-booking', [OrderRealTimeController::class, 'createBooking']);


Route::post('/test', [OrderRealTimeController::class, 'seatConfigRun']);


Route::post('/returnDoubleSide', [NormalSeat_SS_Controller::class, 'returnDoubleSeatSide']);



Route::post('/real-time-seat-update', [BookingController::class, 'realTimeSeatHoldingStatus']);
Route::post('/real-time-seat-release', [BookingController::class, 'realTimeSeatReleaseStatus']);

/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////// All view apis are done here///////////////////

// now building stuff


Route::post('/user-register', [UserAuthController::class, 'userRegister']);
Route::post('/user-login', [UserAuthController::class, 'userLogin']);

Route::post('/findGender', [TestController::class, 'findGender']);
Route::get('/search-location', [TestController::class, 'searchLocation']);

Route::get('/view-bus-seat-configs', [ViewSeatConfigs::class, 'viewSeatConfigs']);


Route::post('/add-route-info', [BusRouteInfo::class, 'addRouteInfo']);
Route::post('/search-bus', [BusRouteInfo::class, 'searchBus']);
Route::post('/fetch-bus-data', [BusRouteInfo::class, 'fetchSingleBusData']);
Route::get('/fetch-bus-state/{busId}', [BusRouteInfo::class, 'fetchBusState']);  // if eg:sleeper?render 
Route::post('/boarding-dropping-info', [BusRouteInfo::class, 'fetchBoardDropinfo']);



Route::post('/continue-booking', [BookingController::class, 'continueBooking']);
Route::post('/fetch-psg-fields', [BookingController::class, 'fetchPsgFields']);
Route::post('/add-psg-data', [BookingController::class, 'addPsgData']);
Route::post('/fetch-data-for-payOnBoard', [BookingController::class, 'fetchPayOnBoardData']);
Route::post('/pay-on-board', [BookingController::class, 'payOnBoard']);
Route::post('/fetch-my-ticket', [BookingController::class, 'fetchMyTicket']);