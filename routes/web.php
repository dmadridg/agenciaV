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

#Root url
Route::get('/', 'HomeController@index');

#Root url
Route::get('/membresias', 'HomeController@membresias');
Route::get('/agencias', 'HomeController@agencias');
Route::get('/socios', 'HomeController@socios');
Route::get('/operadores', 'HomeController@operadores');
Route::get('/empresas', 'HomeController@empresas');

#Login view
Route::get('login', function () {
    return view('login');
})->name('login');

#Logout url
Route::get('logout', 'LoginController@logout');

#Sign up url
Route::get('sign-up', 'LoginController@sign_up');
Route::post('register', 'CustomersController@save');

#Push url test
Route::get('test', function() {
    event(new App\Events\PusherEvent('Hi there Pusher!'));
    return 'Event sent';
});

#Route url
Route::post('login', 'LoginController@index');

#Admin url
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', 'LoginController@load_dashboard')->middleware('role:Administrador');

    #Profile view
    Route::middleware(['role:Cliente'])->prefix('profile')->group(function () {
        Route::get('/', 'CustomersController@show_profile');
        Route::get('load_user_card', 'CustomersController@load_user_card');

        Route::post('save', 'CustomersController@save_profile');
        Route::post('save/address', 'CustomersController@save_address');
    });

    #Customers CRUD
    Route::middleware(['role:Administrador'])->prefix('clientes')->group(function () {
        Route::get('/', 'CustomersController@index');
        Route::get('form/{id?}', 'CustomersController@form');
        Route::post('save', 'CustomersController@save');
        Route::post('update', 'CustomersController@update');
        Route::post('change-status', 'CustomersController@change_status');
    });

    #Users CRUD
    Route::middleware(['role:Administrador'])->prefix('usuarios')->group(function () {
        #System
        Route::prefix('sistema')->group(function () {
            Route::get('/', 'UsersController@index');
            Route::get('form/{id?}', 'UsersController@form');
            Route::post('save', 'UsersController@save');
            Route::post('update', 'UsersController@update');
            Route::post('delete', 'UsersController@delete');
            Route::post('change-status', 'UsersController@change_status');
        });
    });

    #Comercios CRUD
    Route::middleware(['role:Administrador'])->prefix('comercios')->group(function () {
        Route::get('/', 'BusinessesController@index');
        Route::get('/validaciones', 'BusinessesController@validate_data');
        Route::get('form/{id?}', 'BusinessesController@form');
        Route::post('update', 'BusinessesController@update');
        Route::post('show-business-info', 'BusinessesController@show_business_info');
        Route::post('show-business-data', 'BusinessesController@show_business_data');//Validate
        Route::post('validate-data', 'BusinessesController@change_data_business_status');//Validate
        Route::post('change-status', 'BusinessesController@change_business_status');
    });

    #Comercios CRUD
    Route::middleware(['role:Comercio'])->prefix('mi-comercio')->group(function () {
        Route::get('/', 'BusinessesController@index_ecomerce');
        Route::get('form/{id?}', 'BusinessesController@form');
        Route::post('update-business', 'BusinessesController@update_business');
        Route::post('update-user', 'BusinessesController@update_user');
        Route::post('update-beers', 'BusinessesController@update_beers');
        Route::get('load-my-busines', 'BusinessesController@load_my_business');

        Route::post('upload-content', 'BusinessesController@upload_content');
        Route::post('delete-content', 'BusinessesController@delete_content');
    });

    #Faqs CRUD
    Route::middleware(['role:Administrador,Comercio'])->prefix('cupones')->group(function () {
        Route::get('/', 'CouponsController@index');
        Route::get('form/{id?}', 'CouponsController@form');
        Route::post('save', 'CouponsController@save');
        Route::post('update', 'CouponsController@update');
        Route::post('delete', 'CouponsController@delete');
    });

    #Posts CRUD
    Route::middleware(['role:Administrador'])->prefix('posts')->group(function () {
        Route::get('/', 'PostsController@index');
        Route::get('form/{id?}', 'PostsController@form');
        Route::post('save', 'PostsController@save');
        Route::post('update', 'PostsController@update');
        Route::post('delete', 'PostsController@delete');
        Route::post('upload-content', 'PostsController@upload_content');
        Route::post('delete-content', 'PostsController@delete_content');
    });

    #Faqs CRUD
    Route::middleware(['role:Administrador'])->prefix('faqs')->group(function () {
        Route::get('/', 'FaqsController@index');
        Route::get('form/{id?}', 'FaqsController@form');
        Route::post('save', 'FaqsController@save');
        Route::post('update', 'FaqsController@update');
        Route::post('delete', 'FaqsController@delete');
    });

    #Banners CRUD
    Route::middleware(['role:Administrador'])->prefix('espacios-fotos-app')->group(function () {
        Route::get('/', 'BannersController@index');
        Route::get('form/{id?}', 'BannersController@form');
        Route::post('save', 'BannersController@save');
        Route::post('update', 'BannersController@update');
        Route::post('delete', 'BannersController@delete');
    });

    #Banners CRUD
    Route::middleware(['role:Administrador'])->prefix('eventos-y-actividades')->group(function () {
        Route::get('/', 'EventsController@index');
        Route::get('form/{id?}', 'EventsController@form');
        Route::post('save', 'EventsController@save');
        Route::post('update', 'EventsController@update');
        Route::post('delete', 'EventsController@delete');
    });

    #Comentarios CRUD
    Route::middleware(['role:Administrador'])->prefix('comentarios')->group(function () {
        Route::get('/', 'CommentsController@index');
        Route::get('form/{id?}', 'CommentsController@form');
        Route::post('save', 'CommentsController@save');
        Route::post('update', 'CommentsController@update');
        Route::post('delete', 'CommentsController@delete');
        Route::post('change-status', 'CommentsController@change_status');
    });

    #Cervezas CRUD
    Route::middleware(['role:Administrador'])->prefix('cervezas')->group(function () {
        //Cervezas
        Route::get('/', 'BeersController@index');
        Route::get('form/{id?}', 'BeersController@form');
        Route::post('save', 'BeersController@save');
        Route::post('update', 'BeersController@update');
        Route::post('delete', 'BeersController@delete');

        //Estilos
        Route::prefix('estilos')->group(function () {
            Route::get('/', 'BeersController@style_index');
            Route::get('form/{id?}', 'BeersController@style_form');
            Route::post('save', 'BeersController@style_save');
            Route::post('update', 'BeersController@style_update');
            Route::post('delete', 'BeersController@style_delete');
        });
    });

    #System API
    Route::middleware(['role:Administrador'])->prefix('system')->group(function () {
        Route::post('change-password', 'UsersController@change_password');
        Route::post('change-profile', 'UsersController@change_profile');
        Route::post('upload-content', 'MultiController@upload_content');
    });
});

Route::prefix('api/v1')->group(function () {
    #Ecommerce
    Route::post('sign-up-ecommerce', 'ApiController@sing_up_ecommerce');

    #Customer
    Route::post('sign-up-customer', 'ApiController@sing_up_customer');
    Route::post('sign-in-customer', 'ApiController@sing_in_customer');
});
