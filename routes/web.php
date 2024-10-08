<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\cicleDateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PeyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Product\ProductBasketController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\RentalBasketController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/adm', [AdminPanelController::class, 'index']);
Route::get('/adm/send_msg', [AdminPanelController::class, 'send_msg']);
Route::get('/adm/show_users', [AdminPanelController::class, 'show_users']);
Route::get('/adm/create_post', [AdminPanelController::class, 'create']);
Route::get('/adm/edit_post/{id}', [AdminPanelController::class, 'edit']);
Route::get('/adm/edit_news_pic/{id}', [AdminPanelController::class, 'edit_news_pic']);
Route::patch('/adm/update_news/{id}', [AdminPanelController::class, 'update']);
Route::patch('/adm/update_news_pic/{id}', [AdminPanelController::class, 'update_news_pic']);
Route::post('/adm/create_news', [AdminPanelController::class, 'store']);
Route::post('/adm/create_user', [AdminPanelController::class, 'create_user']);


Route::get('/basket', [RentalBasketController::class, 'index']);
Route::post('/basket/get_basket', [RentalBasketController::class, 'get_basket']);
Route::post('/basket/add_to_basket', [RentalBasketController::class, 'add_to_basket']);
Route::post('/basket/remove_from_basket', [RentalBasketController::class, 'remove_from_basket']);
Route::post('/basket/set_basket_user', [RentalBasketController::class, 'set_basket_user']);

//Route::get('rentals', [RentalController::class,'index']);
Route::get('rentals', [RentalController::class,'index1'])->name('rentals');
Route::get('rental', [RentalController::class,'index']);
Route::get('rental/{id}', [RentalController::class,'show']);
Route::get('rental/{id}/edit', [RentalController::class,'edit']);
Route::get('rental_view/{id}', [RentalController::class,'show']);
Route::patch('rental_update/{id}', [RentalController::class,'update']);

Route::get('shops', [ProductController::class,'index1'])->name('shops');
Route::get('shop', [ProductController::class,'index']);
Route::get('shop/{id}', [ProductController::class,'show']);
Route::get('shop/{id}/edit', [ProductController::class,'edit']);
Route::get('product_view/{id}', [ProductController::class,'show']);
Route::patch('product_update/{id}', [ProductController::class,'update']);

Route::get('/basket_shop', [ProductBasketController::class, 'index']);
Route::post('/basket2/get_basket', [ProductBasketController::class, 'get_basket']);
Route::post('/basket2/add_to_basket', [ProductBasketController::class, 'add_to_basket']);
Route::post('/basket2/remove_from_basket', [ProductBasketController::class, 'remove_from_basket']);
Route::post('/basket2/set_basket_user', [ProductBasketController::class, 'set_basket_user']);

if(env('APP_DEBUG', false)) {
    Route::get('/importbase2', [ProductController::class, 'importBase1']);
    Route::get('/importbase', [RentalController::class, 'importBase1']);

Route::get('/hello-email', [HelloController::class, 'sendHelloMail']);

    Route::get('/test', function () {
        return view('test1');
    });
    Route::get('/zakaz', function () {
        return view('zakazi');
    });
    Route::get('/boolshit', function () {
        return view('boolshit');
    });
}

Route::get('/agreement', function (){return view('agreement');});
Route::get('/contact', function (){return view('contact-form');});
Route::post('/contact1', [cicleDateController::class, 'store']);
Route::post('/returnDates', [cicleDateController::class, 'return_dates']);

Route::get('/', function (){return view('test1');});
Route::get('/posts', [PostController::class, 'index']);
Route::get('/contacts', function (){return view('contacts.index');});
Route::get('/rooles', function (){return view('rooles.index');});
Route::get('/portfolio', function (){return view('portfolio.index');});

Route::get('/pey', [PeyController::class, 'index']);
//Route::post('/pey',  [PeyController::class, 'store']);

Route::get('file-upload', [FileController::class, 'index']);
Route::post('file-upload', [FileController::class, 'store'])->name('file.store');
Route::post('upload-files', [FileController::class,'store']);

Route::get('/postcreate', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->name('test.store');;

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
