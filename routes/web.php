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



Route::get('/', function () {
    return view('welcome');
});


Route::get('/add',function (){
    return \App\User::find(1)->add_friend(2);
});
Route::get('/accept',function (){
    return \App\User::find(2)->accept_friend(1);
});
Route::get('/friends',function (){
    return \App\User::find(1)->friends();
});
Route::get('/pending_friends',function (){
    return \App\User::first()->pending_friend_requests();
});
Route::get('/ids',function (){
    return \App\User::first()->friend_ids();
});
Route::get('/is_friends',function (){
    return \App\User::find(1)->is_friends_with(1);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function (){
    Route::get('/profile/{slug}',[
        'uses'=>'profilesController@index',
        'as'=>'profile'
    ]);
    Route::get('/profile/edit/{slug}',[
        'uses'=>'profilesController@edit',
        'as'=>'profile.edit'
    ]);
    Route::post('/profile/update}',[
        'uses'=>'profilesController@update',
        'as'=>'profile.update'
    ]);
    Route::get('/check_relationship_status/{id}',[
        'uses'=>'FriendshipsController@check',
        'as'=>'check'
    ]);
    Route::get('/add_friend/{id}',[
        'uses'=>'FriendshipsController@add_friend',
        'as'=>'add_friend'
    ]);
    Route::get('/accept_friend/{id}',[
        'uses'=>'FriendshipsController@accept_friend',
        'as'=>'accept_friend'
    ]);

    Route::get('get_unread',function (){
       return Auth::user()->unreadNotifications;
    });
    Route::get('/notifications',[
        'uses'=>'HomeController@notifications',
        'as'=>'notifications'
    ]);
    Route::post('/create/post',[
        'uses'=>'PostsController@store',
        'as'=>'create.post'
    ]);
    Route::get('/feed',[
        'uses'=>'FeedsController@feed',
        'as'=>'feed'
    ]);
    Route::get('/get_auth_user_data',function(){
        return Auth::user();
    });
    Route::get('/like/{id}',[
        'uses'=>'LikesController@like',
        'as'=>'Like'
    ]);
    Route::get('/unlike/{id}',[
        'uses'=>'LikesController@unlike',
        'as'=>'Unlike'
    ]);
});