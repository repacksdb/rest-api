<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepacksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
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

Route::get('/repacks', [RepacksController::class, 'index']);
Route::get('/repacks/id/{repack_id}', [RepacksController::class, 'show']);

Route::get('/repacks/search/{title}', [RepacksController::class, 'search']);
Route::get('/repacks/advanced-search', [RepacksController::class, 'advancedSearch']);

Route::get('/repacks/genre/{genre}', [RepacksController::class, 'genre']);
Route::get('/repacks/language/{language}', [RepacksController::class, 'language']);
Route::get('/repacks/repacker/{repacker}', [RepacksController::class, 'repacker']);

// All other routes will return a 404 Not Found
Route::get('{any}', function () {
    return response()->json([
        'message' => 'Endpoint not found.',
        'documentation_url' => 'https://docs.repacksdb.com/',
    ], 404);
})->where('any', '.*');
