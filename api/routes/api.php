<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('employees', EmployeeController::class)
    ->except(['update', 'destroy'])
    ->missing(function (Request $request) {
        return response()->json([
            'message' => "The employee with id $request->employee doesn't exist."
        ], 404);
    });

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found'
    ]);
});