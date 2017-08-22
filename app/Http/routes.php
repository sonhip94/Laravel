<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'cate'], function () {
        Route::get('list', [
            'as' => 'admin.cate.list',
            'uses' => 'CateController@getList'
        ]);
        Route::get('add', [
            'as' => 'admin.cate.getAdd',
            'uses' => 'CateController@getAdd'
        ]);
        Route::post('add', [
            'as' => 'admin.cate.postAdd',
            'uses' => 'CateController@postAdd'
        ]);
        Route::get(
            'edit/{id}', [
            'as' => 'admin.cate.getEdit',
            'uses' => 'CateController@getEdit'
        ]);
        Route::post(
            'edit/{id}', [
            'as' => 'admin.cate.postEdit',
            'uses' => 'CateController@postEdit'
        ]);
        Route::get(
            'delete/{id}', [
            'as' => 'admin.cate.getDelete',
            'uses' => 'CateController@getDelete'
        ]);
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('list', [
            'as' => 'admin.product.list',
            'uses' => 'ProductController@getList'
        ]);
        Route::get('add', [
            'as' => 'admin.product.getAdd',
            'uses' => 'ProductController@getAdd'
        ]);
        Route::post('add', [
            'as' => 'admin.product.postAdd',
            'uses' => 'ProductController@postAdd'
        ]);
        Route::get('delete/{id}', [
            'as' => 'admin.product.getDelete',
            'uses' => 'ProductController@getDelete'
        ]);
        Route::get('edit/{id}', [
            'as' => 'admin.product.getEdit',
            'uses' => 'ProductController@getEdit'
        ]);
        Route::post('edit/{id}', [
            'as' => 'admin.product.postEdit',
            'uses' => 'ProductController@postEdit'
        ]);
        Route::get('delimg/{id}', [
            'as' => 'admin.product.getDelImg',
            'uses' => 'ProductController@getDelImg'
        ]);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', [
            'as' => 'admin.user.list',
            'uses' => 'UserController@getList'
        ]);
        Route::get('edit/{id}', [
            'as' => 'admin.user.getEdit',
            'uses' => 'UserController@getEdit'
        ]);
        Route::post('edit/{id}', [
            'as' => 'admin.user.postEdit',
            'uses' => 'UserController@postEdit'
        ]);
        Route::get('delete/{id}', [
            'as' => 'admin.user.getDelete',
            'uses' => 'UserController@getDelete'
        ]);
    });
    Route::group(['prefix' => 'invoice'], function () {
        Route::get('list', [
            'as' => 'admin.invoice.list',
            'uses' => 'InvoiceController@getList'
        ]);
        Route::get('detail/{id}', [
            'as' => 'admin.invoice.getInvoice',
            'uses' => 'InvoiceController@getInvoice'
        ]);
        Route::post('detail/{id}', [
            'as' => 'admin.invoice.postInvoice',
            'uses' => 'InvoiceController@postInvoice'
        ]);
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('list', [
            'as' => 'admin.comments.list',
            'uses' => 'CommentController@getList'
        ]);
        Route::get('detail/{id}', [
            'as' => 'admin.comments.getComment',
            'uses' => 'CommentController@getComment'
        ]);
        Route::get('delete/{id}', [
            'as' => 'admin.comments.getDelete',
            'uses' => 'CommentController@getDelete'
        ]);
        Route::get('deleteReply/{id}', [
            'as' => 'admin.comments.getDeleteReply',
            'uses' => 'CommentController@getDeleteReply'
        ]);
    });
});
Route::group(['prefix' => 'auth'], function () {
    Route::get('register', [
        'as' => 'getRegister',
        'uses' => 'Auth\AuthController@getRegister'
    ]);
    Route::post('register', [
        'as' => 'postRegister',
        'uses' => 'Auth\AuthController@postRegister'
    ]);

    Route::get('login', [
        'as' => 'getLogin',
        'uses' => 'Auth\AuthController@getLogin'
    ]);
    Route::post('register', [
        'as' => 'postRegister',
        'uses' => 'Auth\AuthController@postRegister'
    ]);
    Route::get('logout', [
        'as' => 'getLogout',
        'uses' => 'Auth\AuthController@getLogout'
    ]);
});
Route::get('admin', function () {
    return view("auth.login");
});
//------ProductController
Route::get('d/{id}/{tenloai}', [
    'as' => 'chitiet',
    'uses' => 'ProductController@chitiet'
]);
Route::get('mua-hang/{id}/{tensanpham}', [
    'as' => 'muahang',
    'uses' => 'ProductController@muahang'
]);

Route::get('xoa/{id}', [
    'as' => 'xoasanpham',
    'uses' => 'ProductController@xoasanpham'
]);
Route::get('cap-nhat/{id}/{qty}', [
    'as' => 'capnhat',
    'uses' => 'ProductController@capnhat'
]);

Route::get('gio-hang', [
    'as' => 'giohang',
    'uses' => 'ProductController@giohang'
]);

Route::any('/search', [
    'as' => 'getSearch',
    'uses' => 'ProductController@getSearch'
]);

Route::get('searchAjax', [
    'as' => 'searchAjax',
    'uses' => 'ProductController@searchAjax'
]);
//CateController

Route::get('c/{id}/{tenloai}', [
    'as' => 'loaisanpham',
    'uses' => 'CateController@loaisanpham'
]);


///Invoice Controller
Route::get('thanh-toan', [
    'as' => 'getCheckout',
    'uses' => 'InvoiceController@getCheckout'
]);
Route::post("thanh-toan", [
    'as' => 'postCheckout',
    'uses' => 'InvoiceController@postCheckout'
]);
//CommentController
Route::post('d/{id}/{alias}', [
    'as' => 'comment',
    'uses' => 'CommentController@comment'
]);
Route::post('d/{id}/{alias}/{com_id}', [
    'as' => 'reply',
    'uses' => 'CommentController@reply'
]);
//WelcomeController

Route::get('lien-he', [
    'as' => 'getLienhe',
    'uses' => 'WelcomeController@getLienhe'
]);

Route::post('lien-he', [
    'as' => 'postLienhe',
    'uses' => 'WelcomeController@postLienhe'
]);
//--------------------
Route::any('{all?}', 'WelComeController@index')->where('all', '(.*)');
