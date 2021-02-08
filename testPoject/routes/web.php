<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ToolController;
use App\Models\Tool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Attribute;
use App\Notifications\AttributeExpired;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    //Ajax call to address
    $response = Http::get('http://api.ipify.org')->body();
    //Check if the current user is admin
    $user = Auth::user();
    if($user->isAdministrator()){
        $userObjects = Tool::all();
    } else {
        $userObjects = Tool::where('user_id', $user->id)->get();
    }
    return view('dashboard',compact(['userObjects','response']));
})->middleware(['auth'])->name('dashboard');

Route::resource('tools',ToolController::class);
Route::resource('attributes',AttributeController::class);


//Route::get('/test', function () {
//    $attribute = Attribute::find(1);
//
//    return (new AttributeExpired($attribute))->toMail($attribute->user_id);
//});






require __DIR__.'/auth.php';
