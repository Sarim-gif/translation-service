<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TranslationController;

Route::middleware('api.token')->group(function() {
    Route::post('translations', [TranslationController::class,'store']);
    Route::get('translations', [TranslationController::class,'index']);
    Route::get('translations/export', [TranslationController::class,'export']);
    Route::put('translations/{id}', [TranslationController::class,'update']);
});
