<?php

use App\Http\Controllers\MjuStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('mju/{student_code}', [MjuStudentController::class, 'store']);
Route::delete('mju/{student_code}', [MjuStudentController::class, 'destroy']);
Route::put('mju/{student_code}', [MjuStudentController::class, 'update']); // เปลี่ยนเป็นเมธอด put() เพื่อใช้ในการอัปเดตข้อมูล
Route::resource('mju',MjuStudentController::class);
Route::get('/MjuStudent',[MjuStudentController::class,'index']);