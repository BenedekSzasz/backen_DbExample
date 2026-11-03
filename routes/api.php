<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DrinkController;
use App\Http\Controllers\api\PubController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/drinks", [PubController::class, "getDrinks"]);
Route::get("/drink/{id}", [PubController::class, "getDrinkId"]);
Route::get("/drinks/{drink}", [PubController::class, "getDrinkByName"]);

// Route::get("/drinks", [DrinkController::class, "getDrinks"]);
// Route::get("/drink-names", [DrinkController::class, "getDrinkNames"]);
// Route::get("/drink", [DrinkController::class, "getDrink"]);
// Route::get("/less-hundred", [DrinkController::class, "getLessHundred"]);
// Route::get("/canned", [DrinkController::class, "getCannedDrinks"]);
// Route::get("/all-drinks", [DrinkController::class, "getAllDrinks"]);
// Route::get("/drinks/{id}", [DrinkController::class, "updateDrink"]);
// Route::get("/del-Drink/{id}", [DrinkController::class, "deleteDrink"]);