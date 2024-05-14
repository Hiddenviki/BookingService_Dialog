<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\DialogController;
use Illuminate\Support\Facades\Route;

Route::post('message/create', [MessageController::class, 'create']);
Route::get('messages/get/{id}', [MessageController::class, 'getMessagesByDialogId']);
Route::post('dialog/create', [DialogController::class, 'create']);
Route::get('dialog/landlord_tenant/get', [DialogController::class, 'getByLandlordAndTenantIds']);
