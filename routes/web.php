<?php

use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::controller(AuthController::class)->middleware("guest")->group(function () {

    Route::get("dashboard/login", "DashboardloginPage")->name("dashboard.login.page");
    Route::get("login", "create")->name("login.create");

    Route::post("login", "store")->name("login.store");

});


Route::post("logout", [AuthController::class, "logout"])->name("logout")->middleware("auth");



Route::prefix("dashboard")->name("dashboard.")->middleware("auth")->group(function () {

    Route::get("/index", [DashboardController::class, "index"])->name("index");


    Route::resource("authors", AuthorController::class);

    Route::resource("sections", SectionController::class);
});
