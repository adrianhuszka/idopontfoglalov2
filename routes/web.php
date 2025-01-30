<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{id}', [EventController::class, 'showEvent'])->name('event.details');
Route::post('/participants', [ParticipantsController::class, ''])->name('');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users');

    Route::get('/admin/events', [EventController::class, 'adminEvent'])->name('admin.events');

    Route::get('/admin/events/{id}', [EventController::class, 'showAdminEvent'])->name('admin.event.details');
});
