<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::get('/about-me', function () {
    return view("about");
});

Route::view('/contact-me', "contact", [
    "page_name" => "contact me",
    "page_description" => "this is a fake disctiption"
]);

Route::get('/category/{id}', function ($id) {

    $cat = [
        '1' => 'programming',
        '2' => 'Games',
        '1' => 'Books',
    ];

    return view("category", [
        'page_name' => 'category',
        'id' => $cat[$id] ?? 'this category not found'
    ]);
});

Route::group(['namespace' => 'Front', 'prefix' => 'users'], function () {
    Route::get('', function () {
        return 'you are in';
    });
    Route::get('show', 'UserController@showName');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::resource('news', 'NewsController');

Route::get('index', 'Front\UserController@getIndex');

Route::get('landing', 'ProjectBoot@showLanding');

Route::get('about', function () {
    $obj = new \stdClass();
    $obj->name = 'mo';
    $obj->department = 'computer science';
    $obj->level = 'four';
    return view('about', compact('obj'));
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('redirect/{services}', 'socialController@redirect');

Route::get('callback/{services}', 'socialController@callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['namespace' => 'DBcontroller', 'prefix' => 'offers'], function () {

        Route::get('create', 'OfferController@create');

        Route::post('store', 'OfferController@store')->name('offers.store');

        Route::get('getall', 'OfferController@getAllOffers');
    });
});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
