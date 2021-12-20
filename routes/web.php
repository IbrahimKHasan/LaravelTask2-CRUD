<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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
Route::resource('movies', MovieController::class);

// Route::get('/',function(){
// return view('movies.index');
// });
// Route::get('/add-movies',function(){
//     return view('pages.addMovies');
// });
