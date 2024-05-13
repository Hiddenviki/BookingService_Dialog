<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::post('message/create', [MessageController::class, 'create']);
Route::get('messages/get/{id}', [MessageController::class, 'getMessagesByDialogId']);
