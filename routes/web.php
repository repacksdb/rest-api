<?php

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

Route::get('/', function () {
    return [
        "name" => "RepacksDB API",
        "author_url" => "https://github.com/notcoderguy",
        "version" => "1.0.0",
        "website_url" => "https://repacksdb.com",
        "documentation_url" => "https://docs.repacksdb.com/",
        "github_url" => "https://github.com/repacksdb/rest-api",
        "production_api_url" => "https://api.repacksdb.com/v1/",
        "status_url" => "https://status.repacksdb.com"
    ];
});
