<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller3;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
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

//Route::get('/invoke',Controller3::class); //,call invoke controller function



Route::get('/', function () {
    return view('website.index');
});

Route::get('/index', function () {
    return view('website.index');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/service', [ServiceController::class, 'index']);


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

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/add_contact', [ContactController::class, 'store']);

Route::get('/login', [CustomerController::class, 'login'])->middleware('Beforelogin_u');
Route::post('/auth_login', [CustomerController::class, 'auth_login'])->middleware('Beforelogin_u');
Route::get('/cust_logout', [CustomerController::class, 'cust_logout']);
Route::get('/signup', [CustomerController::class, 'create'])->middleware('Beforelogin_u');
Route::post('/add_signup', [CustomerController::class, 'store'])->middleware('Beforelogin_u');

Route::get('/profile', [CustomerController::class, 'profile'])->middleware('Afterlogin_u');
Route::get('/edit_profile/{id}', [CustomerController::class, 'edit'])->middleware('Afterlogin_u');
Route::post('/update_profile/{id}', [CustomerController::class, 'update'])->middleware('Afterlogin_u');


Route::get('/404', function () {
    return view('website.404');
});



//===== Admin Routes =======================================================



Route::group(['middleware' => ['Beforelogin_a']], function () {

    Route::get('/admin-login', [AdminController::class, 'index']);
    Route::post('/admin_auth_login', [AdminController::class, 'admin_auth_login']);
});

Route::group(['middleware' => ['Afterlogin_a']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin_logout', [AdminController::class, 'admin_logout']);
    Route::get('/add_services', [ServiceController::class, 'create']);
    Route::get('/manage_services', [ServiceController::class, 'show']);
    Route::get('/manage_services/{id}', [ServiceController::class, 'destroy']);
    Route::get('/add_categories', [CategoryController::class, 'create']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/manage_categories', [CategoryController::class, 'show']);
    Route::get('/manage_categories/{id}', [CategoryController::class, 'destroy']);
    Route::get('/manage_contacts', [ContactController::class, 'show']);
    Route::get('/manage_contacts/{id}', [ContactController::class, 'destroy']);
    Route::get('/manage_customers', [CustomerController::class, 'show']);
    Route::get('/manage_customers/{id}', [CustomerController::class, 'destroy']);
    Route::get('/status_customers/{id}', [CustomerController::class, 'status_customers']);
});
