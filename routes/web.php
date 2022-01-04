<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Models\User;

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

/**************/
/* View Users */
/**************/

Route::get('/', [HomeController::class, 'display'])
    ->name('home');

/*************/
/* View User */
/*************/

Route::get('/users/{user}', [
    'as' => 'user', 
    'uses' => 'App\Http\Controllers\UsersController@displayUser'
]);

/************/
/* Add User */
/************/

Route::get('/add-user', [UsersController::class, 'displayAddUser'])
    ->name('addUser');

//  Handle form submission
Route::post('/add-user', function() {
    User::create([
        'name' => request('name'),
        'company' => request('company'),
        'role' => request('role'),
        'rate' => request('rate'),
        'rate_currency' => request('rate_currency'),
        'img' => 'https://randomuser.me/api/portraits/lego/' . rand(0,8) . '.jpg'
    ]);
    return redirect('/');
});