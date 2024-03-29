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

use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon;
use Intervention\Image\Image;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

use Talal\LabelPrinter\Printer;
use Talal\LabelPrinter\Mode\Escp;
use Talal\LabelPrinter\Command;

Route::get('/home', 'WelcomeController')->name('home');
Route::get('/', 'WelcomeController')->name('home');

Route::name('site.')->namespace('Site')->group(function () {
    Route::get('/categorieen', 'CategoryController@index')->name('category.index');
    Route::get('/c-{id}', 'CategoryController@show')->name('category.show');
    Route::get('/producten', 'ProductController@index')->name('product.index');
    Route::get('{title}/p-{id}', 'ProductController@show')->name('product.show');
    Route::get('winkelwagen', 'CartController@index')->name('cart.index');
    Route::get('gegevens', 'CartController@create')->name('cart.create');
    Route::post('gegevens', 'OrderController@store')->name('order.store');
    Route::post('/review', 'ReviewController@store')->name('review.store');
    Route::get('/order-{id}', 'OrderController@show')->name('order.show');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
    Route::get('/over-ons', 'PageController@about')->name('about');
    Route::get('/faq', 'PageController@faq')->name('faq');
    Route::get('/algemene-voorwaarden', 'PageController@terms')->name('terms');
    Route::get('/privacy-en-cookiebeleid', 'PageController@policy')->name('privacy');
//    Route::get('find', 'SearchController@find')->name('search');

    Route::prefix('shoppingcart/')->group(function ()
    {
        Route::get('/', ['as' => 'cart.index', 'uses' => 'CartController@index']);
        Route::get('/checkout', ['as' => 'cart.checkout', 'uses' => 'CartController@create']);
        Route::post('/cart', ['as' => 'cart.add', 'uses' => 'CartController@add']);
        Route::post('/verwijder', ['as' => 'cart.remove', 'uses' => 'CartController@remove']);
        Route::post('/plus', ['as' => 'cart.increase', 'uses' => 'CartController@increase']);
        Route::post('/min', ['as' => 'cart.decrease', 'uses' => 'CartController@decrease']);
        Route::post('/legen', ['as' => 'cart.empty', 'uses' => 'CartController@destroy']);
    });
});

//user panel
Route::group(['prefix' => 'panel', 'namespace' => 'Auth', 'as' => 'auth.', 'middleware' => 'auth'], function () {
    Route::get('/', 'PanelController')->name('panel');
    Route::get('/mijn-bestellingen', 'OrderController@index')->name('order.index');
    Route::get('/mijn-bestelling-{id}', 'OrderController@show')->name('order.show');
    Route::get('/pdf-{id}-download', 'OrderController@download')->name('order.download');
    Route::get('/pdf-{id}-bekijken', 'OrderController@view')->name('order.view');
    Route::get('/mijn-account-wijzigen', 'UserController@edit')->name('account.edit');
    Route::patch('/watchwoord-update', 'UserController@password')->name('account.password');
    Route::patch('/gegevens-update', 'UserController@info')->name('account.info');
});

//admin
Route::name('admin.')->namespace('Admin')->middleware('admin')->prefix('admin/') ->group(function () {
    Route::get('/', 'DashboardController')->name('dashboard'); ;
    Route::get('/dashboard', 'DashboardController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('review', 'ReviewController');
    Route::resource('order', 'OrderController');
    Route::resource('product', 'ProductController');
    Route::get('/product-type/create-{product_id}', 'ProductTypeController@create')->name('product-type.create');
    Route::get('/product-type/edit-{product_type_id}', 'ProductTypeController@edit')->name('product-type.edit');
    Route::post('product-type', 'ProductTypeController@store')->name('product-type.store');
    Route::patch('product-type/{product_id}/{product_type_id}', 'ProductTypeController@updateDetail')->name('product-type.update');
    Route::delete('product-type/{product_type_id}', 'ProductTypeController@destroy')->name('product-type.delete');
    Route::resource('detail', 'DetailController');
    Route::post('add_property', 'DetailController@storeProperty')->name('detail.store-property');
    Route::post('add_detail', 'DetailController@storeDetail')->name('detail.store-detail');
    Route::patch('update_detail-{id}', 'DetailController@updateDetail')->name('detail.update-detail');
    Route::delete('delete_property-{id}', 'DetailController@destroyProperty')->name('detail.delete-property');
    Route::patch('mollie-refund-{id}', 'MollieController@refund')->name('mollie.refund');
    Route::resource('faq', 'FaqController');
    Route::patch('editor/{id}/update', 'TextController@update')->name('text-editor.update');
    Route::resource('editor', 'TextController', ['only' => ['index', 'edit']]);
    Route::resource('seo-manager', 'SeoController');
    Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');
    Route::get('notificaties', 'NotificationController@index')->name('notification.index');
    Route::get('notificaties/{id}', 'NotificationController@show')->name('notification.show');
    Route::get('pdf/streamInvoice/{id}', 'PdfController@streamInvoice')->name('pdf.streamInvoice');
    Route::get('pdf/downloadInvoice{id}', 'PdfController@downloadInvoice')->name('pdf.downloadInvoice');
});

Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['web', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('login/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('login.redirect');
Route::get('login/{provider}/callback','Auth\SocialAuthController@handleProviderCallback')->name('login.callback');
Route::name('webhooks.mollie')->post('webhooks/mollie', 'Site\WebhookController@handle');
Route::get('/site-map', 'Site\SiteMapController');


//Route::get('/symlink', function (){
//    return symlink(
//        '/home/mediaver/domains/tantemartje.nl/laravel/storage/app/public',
//        '/home/mediaver/domains/tantemartje.nl/private_html/storage'
//        );
//})->name('page.show');