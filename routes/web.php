<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\TicketController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::get('companies/list',[CompanyController::class,'companieslist'])->name('companieslist');

Route::resource('companies',CompanyController::class)->middleware(['auth:sanctum']);
Route::resource('projects',ProjectController::class)->middleware(['auth:sanctum']);
Route::resource('userhistories',UserHistoryController::class)->middleware(['auth:sanctum']);
Route::resource('tickets',TicketController::class)->middleware(['auth:sanctum']);
Route::put('tickets/progress/${id}',[TicketController::class,'progress'])->name('progress')->middleware(['auth:sanctum']);
Route::put('tickets/finish/${id}',[TicketController::class,'finish'])->name('finish')->middleware(['auth:sanctum']);

