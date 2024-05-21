<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;

Route::post('/user', [UserController::class, 'store']);
Route::delete('/user/{user}', [UserController::class, 'delete']);
Route::get('/user', [UserController::class, 'get']);
Route::get('/user/{user}', [UserController::class, 'getOne']);

Route::post('/note', [NoteController::class, 'store']);
Route::delete('/note/{note}', [NoteController::class, 'delete']);
Route::get('/note', [NoteController::class, 'get']);
Route::get('/note/{note}', [NoteController::class, 'getOne']);

Route::post('/unit', [UnitController::class, 'store']);
Route::delete('/unit/{unit}', [UnitController::class, 'delete']);
Route::get('/unit', [UnitController::class, 'get']);
Route::get('/unit/{unit}', [UnitController::class, 'getOne']);

Route::post('/contact', [ContactController::class, 'store']);
Route::delete('/contact/{contact}', [ContactController::class, 'delete']);
Route::get('/contact', [ContactController::class, 'get']);
Route::get('/contact/{contact}', [ContactController::class, 'getOne']);

Route::post('/company', [CompanyController::class, 'store']);
Route::delete('/company/{company}', [CompanyController::class, 'delete']);
Route::get('/company', [CompanyController::class, 'get']);
Route::get('/company/{company}', [CompanyController::class, 'getOne']);
