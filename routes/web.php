
<?php
use App\User;
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Auth::routes(['verify' => true]);






Route::get('/chat/{profile}','MessagesController@index');
Route::get('/{user}','PostsController@index');
Route::get('/','HomeController@welcome');

Route::post('/p','PostsController@store');
Route::get('/p/create','PostsController@create');
Route::get('/p/{post}','PostsController@show')->name('posts.show');;


Route::post('follow/{user}','FollowsController@store');



// user enters  url in the browser   -> http://127.0.0.1:8000/profile/2
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

// this route calls function  index from  profiles controller




Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}/settings','ProfilesController@settings')->middleware(['auth','password.confirm']);
Route::post('/profile/changeusername','ProfilesController@changeusername');
Route::post('/profile/changeemail','ProfilesController@changeemail');
Route::post('/profile/changepassword','ProfilesController@changepassword');
Route::post('/profile/delete','ProfilesController@deleteuser')->middleware(['auth','password.confirm']);





Route::patch('/search','SearchController@search');
Route::get('/delete/{id}','PostsController@destroy');


Route::post('/c', 'CommentsController@store');

Route::post('/message/store', 'MessagesController@store');
Route::get('/message/{user}','MessagesController@index');




Route::get('/like/{post}','LikesController@store');
Route::get('/dislike/{post}','LikesController@destroy');
Route::post('/emailvalidation','ValidatorController@checkEmail');


?>