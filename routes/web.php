<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
Route::controller(PageController::class)->group(function () {
    Route::get("/","index")->name("home");
});
Route::name("posts.")->prefix("news")->controller(PostController::class)->group(function () {  
    Route::get("/","index")->name("index");
    Route::post("/","store")->name("store");
    Route::post("/{id}","update")->name("update");
    Route::get("/api/{id}","show")->name("get");
    Route::delete("/{id}","destroy")->name("delete");
    Route::get("/{slug}","show")->name("show");
});
Route::name("comments.")->prefix("comments")->controller(CommentController::class)->group(function () {  
    Route::get("/","index")->name("index");
});
Route::get("/category/{category}",[PostController::class, "index_category"])->name("index_category");
Route::get("/tag/{tag}",[PostController::class, "index_tag"])->name("index_tag");

Route::name("admin.")->prefix("admin")->controller(AdminController::class)->group(function () {
    Route::middleware("auth")->group(function () {
        Route::get("/profile","profile")->name("profile");
        Route::put("/","update")->name("update");
        Route::post("/logout","logout")->name("logout");
    });
    Route::get("/","index")->name("index");
    Route::post("/","login");
});