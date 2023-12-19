<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Contact;
use App\Http\Controllers\Admin\Pages;
use App\Http\Controllers\Web\Page;
use App\Http\Controllers\Web\Blog;
use App\Http\Controllers\Web\SiteMapController;

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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/add-block', [Pages::class, 'addBlockPage'])
        ->name('add.block');
    Route::get('/add-block-img', [Pages::class, 'addBlockImg'])
        ->name('add.block.img');
    Route::get('/remove-block/{id}', [Pages::class, 'removeBlock'])
        ->name('remove.block');
    Route::post('/update-order-block', [Pages::class, 'updateOrderBlockPage'])
        ->name('update.order.block');
});

Route::get('/sitemap', [SiteMapController::class, 'index'])
    ->name('sitemap.index');

Route::post('/contact/submit', [Contact::class, 'sendContact'])
    ->name('contact.sendcontact')->middleware(\Spatie\Honeypot\ProtectAgainstSpam::class);

Route::get('/blogs', [Blog::class, 'index'])
    ->name('blogs.index');
Route::get('/blog/{slug}', [Blog::class, 'singleBlog'])
    ->name('blogs.blog');

Route::get('/' , [Page::class, 'index'])->name('home.index');
Route::get('/{slug}' , [Page::class, 'index'])->name('page.index');

Route::get('/clear-cache', function () {
    echo \Illuminate\Support\Facades\Artisan::call('config:clear');
    echo \Illuminate\Support\Facades\Artisan::call('config:cache');
    echo \Illuminate\Support\Facades\Artisan::call('cache:clear');
    echo \Illuminate\Support\Facades\Artisan::call('route:clear');
});
