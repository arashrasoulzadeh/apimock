<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('livewire-base');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/mocks', function () {
    return view('mocks');
})->name('mocks');

Route::middleware(['auth:sanctum', 'verified'])->get('/mock/edit/{id}', function ( Request $request ) {
    return view('mock-edit')->with( 'id', $request->id );
})->name('mock-edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/mock/requests/{id}', function ( Request $request ) {
    return view('mock-request')->with( 'id', $request->id );
})->name('mock-request');