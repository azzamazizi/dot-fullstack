<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ AuthController,UserController,HomeController,KategoriBeritaController,BeritaController };

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

Route::get('/login', [AuthController::class, 'loginpage']);
Route::post('/login', [AuthController::class, 'actlogin']);
Route::get('/logout', [AuthController::class, 'actlogout']);

Route::group(['middleware' => ['checkRole:auth,admin,user']], function () {
    
    Route::post('/user/updateuser', [UserController::class, 'updateUser']);
    
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/ms_kategoriberita', [KategoriBeritaController::class, 'index']);
    Route::get('/ms_kategoriberita/create', [KategoriBeritaController::class, 'create']);
    Route::post('/ms_kategoriberita', [KategoriBeritaController::class, 'store']);
    Route::get('/ms_kategoriberita/edit/{id}', [KategoriBeritaController::class, 'edit']);
    Route::delete('/ms_kategoriberita/{id}', [KategoriBeritaController::class, 'destroy']);

    Route::get('/berita', [BeritaController::class, 'index']);
    Route::get('/berita/create', [BeritaController::class, 'create']);
    Route::post('/berita', [BeritaController::class, 'store']);
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy']);

});


