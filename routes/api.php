<?php

use App\Http\Controllers\DialogController;
use Illuminate\Support\Facades\Route;

Route::post('dialog/create', [DialogController::class, 'create']);
Route::get('dialog/landlord_tenant/get', [DialogController::class, 'getByLandlordAndTenantIds']);
