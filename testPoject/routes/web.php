<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ToolController;
use App\Models\Tool;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    if($user->isAdministrator()){
        $userObjects = Tool::all();
        return view('dashboard',compact('userObjects'));
    }
    $userObjects = Tool::where('user_id', $user->id)->get();
    return view('dashboard',compact('userObjects'));
})->middleware(['auth'])->name('dashboard');

Route::resource('tools',ToolController::class);
Route::resource('attributes',AttributeController::class);

require __DIR__.'/auth.php';
