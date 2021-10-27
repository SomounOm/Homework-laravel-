<?php
use App\http\Controllers\StudentController;
use App\http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//usergi
Route::post('/login',[UserController::class, 'login']);
Route::post('/signup',[UserController::class, 'signup']);
Route::get('/student',[StudentController::class, 'index']);
Route::get('/student/{id}',[StudentController::class, 'show']);

Route::group(['middleware' =>['auth:sanctum']], function(){
    //student Rount
    Route::put('/student/{id}',[StudentController::class, 'update']);
    Route::delete('/student/{id}',[StudentController::class, 'destroy']);
    Route::post('/student',[StudentController::class, 'store']);
    Route::post('/signout',[UserController::class, 'signout']);
    
});