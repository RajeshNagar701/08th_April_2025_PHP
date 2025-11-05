<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('website.index');
});

Route::get('/index', function () {
    return view('website.index');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/service', function () {
    return view('website.service');
});

Route::get('/price', function () {
    return view('website.price');
});

Route::get('/gallery', function () {
    return view('website.gallery');
});

Route::get('/blog', function () {
    return view('website.blog');
});

Route::get('/team', function () {
    return view('website.team');
});

Route::get('/testimonial', function () {
    return view('website.testimonial');
});

Route::get('/404', function () {
    return view('website.404');
});



//===== Admin Routes =======================================================

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin-login', function () {
    return view('admin.admin-login');
});

Route::get('/manage', function () {
    return view('admin.manage');
});

Route::get('/add-service', function () {
    return view('admin.add-service');
});