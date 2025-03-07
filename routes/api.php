<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
});

        // admins
        Route::get("/admins/alldata","API\admincontroller@index");
        Route::get("/admins/showone/{id}","API\admincontroller@show");
        Route::post("/admins/store","API\admincontroller@store");
        Route::post("/admins/delete","API\admincontroller@delete");
        Route::post("/admins/update","API\admincontroller@update");
        
        // categories
        Route::get("/categories/alldata","API\categorycontroller@index");
        Route::get("/categories/showone/{id}","API\categorycontroller@show");
        Route::post("/categories/store","API\categorycontroller@store");
        Route::post("/categories/delete","API\categorycontroller@delete");
        Route::post("/categories/update","API\categorycontroller@update");
    