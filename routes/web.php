<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', function () {
            return view('welcome');
        })->name("welcome");
        Route::post('/message', 'MessageController@store')->name('storemsg');

        Auth::routes();

        //(home route)  
        Route::group(
            ['middleware' => 'CheckUsers'],
            function () {
                Route::get('/home', 'HomeController@index')->name('home');
                Route::get('/categories', 'CategoryController@index')->name('categories');
                   
                Route::get('/posts', 'PostController@index')->name('post');
                Route::get('/posts/delete/{id}', 'PostController@delete')->name('deletepost');

            }
        );

        //(admins routes)
        Route::group(
            ['middleware' => 'CheckAdmin'],
            function () {
                 

                //admins table 
                Route::get('/admin', 'AdminController@index')->name('admin');
                Route::get('/admin/show/{id}', 'AdminController@show')->name('showadmin');
                Route::get('/admin/edit/{id}', 'AdminController@edit')->name('editadmin');
                Route::post('/admin/update', 'AdminController@saveedit')->name('updateadmin');
                Route::get('/admin/delete/{id}', 'AdminController@delete')->name('deleteadmin');
                Route::get('/admin/changepass', 'AdminController@password')->name('pass');
                Route::post('/admin/passchanged', 'AdminController@pass')->name('passadmin');

                //users table  
                Route::get('/create/user', 'HomeController@create')->name('createuser');          
                Route::post('/save/user', 'HomeController@save')->name('saveuser');


                //categoriess table  
                Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('editcate');
                Route::post('/categories/update', 'CategoryController@saveedit')->name('updatecate');
                Route::get('/categories/delete/{id}', 'CategoryController@delete')->name('deletecate');
                Route::get('/categories/create', 'CategoryController@create')->name('createcate');
                Route::post('/categories/save', 'CategoryController@savenew')->name('savecate');

                // messages table  
                Route::get('/messages', 'MessageController@index')->name('message');
                Route::get('/msg/delete/{id}', 'MessageController@delete')->name('deletemsg');
            }
        );

        //(users routes)  
        Route::group(
            ['middleware' => 'CheckUser'],
            function () {

                //posts table  
                Route::get('/posts/edit/{id}', 'PostController@edit')->name('editpost');
                Route::post('/posts/update', 'PostController@saveedit')->name('updatepost');
                Route::get('/posts/create/{id}', 'PostController@create')->name('createpost');
                Route::post('/posts/savenew', 'PostController@savenew')->name('savepost');

                   
  }
        );
    }
);
