<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('invitation', [TestController::class, 'testInvitationMessage']);
Route::get('content', [TestController::class, 'testContentMessage']);
Route::get('service-document', [TestController::class, 'testServiceDocumentMessage']);