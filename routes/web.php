<?php

use App\Http\Controllers\BookController;
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

####################################################  Start Dashboard Routes ####################################################
Route::group(['prefix'=>'dashboard' ,'namespace'=>'Dashboard','middleware'=>'roles','roles'=>'admins'],function(){

    Route::resource('/users','UserController');
    Route::resource('/categories','CategoryController');
});
####################################################  End Dashboard Routes  ####################################################

#################################################### Start Site Routes  ####################################################

########################## Start Books Routes  ##########################
Route::group(['prefix'=>'books','middleware'=>'roles','roles'=>['admins','users']],function(){
    Route::get('/create', 'BookController@create')->name('book.create');
    Route::Post('/upload' ,'BookController@upload')->name('book.upload');
});
########################## End Books Routes  ##########################

################### show latest books route  ###################
Route::get('/', 'BookController@index')->name('welcome');
#################### show latest books route  ###################

################### show  books in specific categoory  ###################
Route::get('/category/books/{id}', 'BookController@showBooksInCategory')->name('category.books');
################### show  books in specific categoory ###################

###################show  books info  ###################
Route::get('/book/{id}', 'BookController@showBookInfo')->name('book.info');
###################show  books info ###################

############# Start Comments Routes ############
Route::group(['middleware'=>'auth'],function(){
    Route::post('/comment/Store/{id}','CommentController@store')->name('comment.store');
});

############# End Comments Routes ############

#################################################### End Site Routes   ####################################################