<?php
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

//+++++++++++++++++++++++++++++
//Auth::routes();
//+++++++++++++++++++++++++++++
Route::get('/', [App\Http\Controllers\TelegramBotController::class, 'index']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendMessage', [App\Http\Controllers\TelegramBotController::class, 'sendMessage']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendPhoto', [App\Http\Controllers\TelegramBotController::class, 'sendPhoto']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendAudio', [App\Http\Controllers\TelegramBotController::class, 'sendAudio']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendVideo', [App\Http\Controllers\TelegramBotController::class, 'sendVideo']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendVoice', [App\Http\Controllers\TelegramBotController::class, 'sendVoice']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendDocument', [App\Http\Controllers\TelegramBotController::class, 'sendDocument']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendLocation', [App\Http\Controllers\TelegramBotController::class, 'sendLocation']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendVenue', [App\Http\Controllers\TelegramBotController::class, 'sendVenue']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendContact', [App\Http\Controllers\TelegramBotController::class, 'sendContact']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('sendPoll', [App\Http\Controllers\TelegramBotController::class, 'sendPoll']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('telegram-message-webhook', [App\Http\Controllers\TelegramBotController::class, 'telegram_webhook']);
