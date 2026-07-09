<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Studentnosql;
use App\Http\Controllers\Student_mongo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes for React + Laravel + MongoDB
|
*/

/* ================= TEST ROUTE ================= */

Route::get('/test', function () {

    return response()->json([

        'status' => 'success',
        'message' => 'API working perfectly'

    ]);

});

/* ================= AUTHENTICATED ROUTES ================= */

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | FETCH STUDENT PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/student-profile', function (Request $request) {

        return Studentnosql::where(
            'user_id',
            (int) $request->user()->id
        )->first();

    });

    /*
    |--------------------------------------------------------------------------
    | UPDATE STUDENT PROFILE
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/student/update',
        [Student_mongo::class, 'update']
    );

});