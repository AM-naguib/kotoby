<?php


use App\Events\NewCommentReviewEvent;
use App\Http\Controllers\Dashboard\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Front\UserProfileController;
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
Route::controller(RegisterController::class)->middleware("guest")->name("register.")->group(function () {

    Route::get("register", "create")->name("create");

    Route::post("register", "store")->name("store");
});

Route::post("logout", [AuthController::class, "logout"])->name("logout")->middleware("auth");



Route::prefix("dashboard")->name("dashboard.")->middleware(["auth","isAdmin"])->group(function () {

    Route::get("/index", [DashboardController::class, "index"])->name("index");


    Route::resource("authors", AuthorController::class);

    Route::resource("sections", SectionController::class);

    Route::resource("books", BookController::class);

    Route::get("settings",[SettingController::class,"index"])->name("settings.index");

    Route::post("settings",[SettingController::class,"update"])->name("settings.update");



    Route::controller(ReviewController::class)->name("reviews.")->prefix("reviews")->group(function () {
        Route::get("/", "index")->name("index");

        Route::get("requests", "requests")->name("requests");

        Route::post("approve/{review}", "approve")->name("approve");

        Route::delete("destroy/{review}", "destroy")->name("destroy");
    });



    Route::post("read-notification", function () {
        auth()->user()->unreadNotifications->markAsRead();
    })->name("read.notification");

});


Route::controller(HomeController::class)->name("front.")->group(function () {

    Route::get("/", "index")->name("index");

    Route::get("book/{slug}", "single")->name("single");

    Route::get("sections", "sections")->name("sections");

    Route::get("authors", "authors")->name("authors");

    Route::get("page/{type}/{slug}", "page")->name("page");

    Route::post("review/{bookId}", "review")->name("review")->middleware("auth");

    Route::get("read-book/{slug}","readBook")->name("read.book")->middleware("readBook");


    Route::get("dowen-book/{slug}","dowenBook")->name("dowen.book")->middleware("dowenBook");

    Route::get("search","search")->name("search");

    Route::get("best","best")->name("best");




});


Route::controller(UserProfileController::class)->prefix("profile")->name("profile.")->group(function () {
    Route::get("/","index")->name("index");


    Route::get("my-favourites","myFavourites")->name("myfavourites");

    Route::get("my-reviews","myReviews")->name("myreviews");

    Route::post("add-favourite/{id}","addFavourite")->name("add.favourite");

    Route::delete("delete-favourite/{id}","deleteFavourite")->name("delete.favourite");

    Route::delete("delete-review/{id}","deleteReview")->name("delete.review");


    Route::get("settings","settings")->name("settings");

    Route::post("update-settings","updateSettings")->name("update.settings");
});







Route::get('test', function () {
    $command = 'start /B php ' . base_path('artisan') . ' sendpages:queue';
    pclose(popen($command, 'r'));

    return 'Command is running in the background!';
});





