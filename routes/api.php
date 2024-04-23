<?php

use App\Http\Controllers\Api\AuditsController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\DeviceStatusController;
use App\Http\Controllers\Api\DieselRequestController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpensesController;
use App\Http\Controllers\Api\LogController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OperationController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TrelaController;
use App\Http\Controllers\Api\TypeDeviceController;
use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\TripController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/login',function(){
    return "GO TO LOGIN" ;
})->name('login');

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('updatepassword',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('profiles', ProfileController::class);
    Route::post('updatepassword',[UserAuthController::class,'updatepassword']);
    Route::get('/updatenotification',[NotificationController::class,'updatenotification']);
    Route::get('/notifications',[NotificationController::class,'index']);
    Route::resource('drivers', DriverController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('trelas', TrelaController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('trips', TripController::class);
    Route::resource('dieselrequest', DieselRequestController::class);
    Route::resource('expenses', ExpensesController::class);

    // Route::resource('companies', CompanyController::class);
    // Route::resource('devices', DeviceController::class);
    // Route::resource('devicestatus', DeviceStatusController::class);
    // Route::resource('employees', EmployeeController::class);
    // Route::resource('operations', OperationController::class);
    
    // Route::resource('typedevices', TypeDeviceController::class);
    // Route::resource('provinces', ProvinceController::class);
    // Route::resource('audits', AuditsController::class);
    // Route::resource('transactions', TransactionController::class);
   
    // Route::post('deliveriesdragdrop',[DeliveryController::class,'deliveriesdragdrop']);
    // Route::get('/export',[ReportController::class,'exporttransaction']);
    // Route::get('/export/user',[ReportController::class,'exportuser']);
    // Route::get('/export/company',[ReportController::class,'exportcompany']);
    // Route::get('/export/device',[ReportController::class,'exportdevice']);
    // Route::get('/export/typedevice',[ReportController::class,'exporttypedevice']);
    // Route::get('/export/audit',[ReportController::class,'exportaudit']);
    // Route::get('/export/employee',[ReportController::class,'exportemployee']);
    

    
});



