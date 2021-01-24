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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// category
   Route::get('category','UserController@viewcategory');
     Route::post('storecategory','UserController@store_category');
      Route::get('showcategory','UserController@show_category');
       Route::get('editcategory/{id}','UserController@edit_category');
        Route::get('deletecategory/{id}','UserController@delete_category');

// tags
         Route::get('tags','UserController@viewtags');
     Route::post('storetags','UserController@store_tags');
      Route::get('showtags','UserController@show_tags');
       Route::get('edittags/{id}','UserController@edit_tags');
        Route::get('deletetags/{id}','UserController@delete_tags');

//blog
        Route::get('blog','UserController@viewblog');
     Route::post('storeblog','UserController@store_blog');
      Route::get('showblog','UserController@show_blog');
       Route::get('editblog/{id}','UserController@edit_blog');
        Route::get('deleteblog/{id}','UserController@delete_blog');

        // creadit post

        Route::get('createpost','UserController@viewpost');
     Route::post('storeposts','UserController@store_posts');
      Route::get('showposts','UserController@show_posts');
       Route::get('editposts/{id}','UserController@edit_posts');
        Route::get('deleteposts/{id}','UserController@delete_posts');

        //post details
          Route::get('postdetails','UserController@viewpostdetails');

