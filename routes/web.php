<?php

use App\Jobs\testt;
use App\Jobs\KutubypdfJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\SectionController;
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

    Route::resource("books", BookController::class);

});









Route::get('test', function () {
    $command = 'start /B php ' . base_path('artisan') . ' sendpages:queue';
    pclose(popen($command, 'r'));

    return 'Command is running in the background!';
});




// Route::get('test', function () {
//     // تشغيل الـ command في الخلفية
//     exec('php ' . base_path('artisan') . ' sendpages:queue > NUL &');

//     // إرسال استجابة فورية إلى المستخدم
//     echo 'Command is running in the background!';

//     // إنهاء الاستجابة وإغلاق الاتصال مع العميل
//     if (function_exists('fastcgi_finish_request')) {
//         fastcgi_finish_request();
//     }

//     // استمرار تشغيل الكود في الخلفية بعد إنهاء الاتصال
// });

