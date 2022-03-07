<?php

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

Route::namespace('Admin')->prefix('admin')->group(function ()
{
    $this->get('/','AdminController@index');
    $this->resource('/category','CategoryController');
    $this->resource('/book','BookController');
    $this->resource('/video','VideoController');
    $this->get('/order/success','OrderController@success')->name('success');
    $this->get('/order/unsuccess','OrderController@unsuccess')->name('unsuccess');
    $this->resource('/discount','DiscountController');
    $this->delete('/order/{id}','OrderController@destroy')->name('delete');
});


Route::namespace('Site')->group(function ()
{
    $this->get('/','SiteController@index');
    $this->get('/category/{menu}','SiteController@menu')->name('menu');
    $this->get('/category/{menu}/{submenu}','SiteController@submenu')->name('submenu');
    $this->get('/single/book/{slug}','SiteController@singleBook');
    $this->get('/single/video/{slug}','SiteController@singleVideo');
    $this->get('/refreshcaptcha', 'SiteController@refreshCaptcha');
    $this->get('pay','SiteController@pay');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

