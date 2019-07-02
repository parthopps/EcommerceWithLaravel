 <?php

Auth::routes();

//frontend routes
Route::get('/','FrontendController@index');
Route::get('contact','FrontendController@contact');
Route::post('contact/insert','FrontendController@contactinsert');

Route::get('about','FrontendController@about');
//Route::get('/product/details/{product_id}','FrontendController@detailproduct');
Route::get('/product/details/{product_id}','FrontendController@detailproduct');
Route::get('/category/wise/product/{category_id}','FrontendController@categorywiseproduct');

// backend routes

Route::get('/home','HomeController@index')->name('home');
Route::get('/add/product/view','ProductController@addproductview');
Route::POST('/add/product/insert','ProductController@addproductinsert');
Route::get('/delete/product/{product_id}','ProductController@deleteproduct');
Route::get('/edit/product/{product_id}','ProductController@editproduct');
Route::POST('/edit/product/insert','ProductController@editproductinsert');
Route::get('/restore/product/{product_id}','ProductController@restoreproduct');
Route::get('/forcedelete/product/{product_id}','ProductController@forcedeletedproduct');
Route::get('/add/Category/view','CategoryController@addcategoryview');
Route::post('/add/Category/insert','CategoryController@addcategoryinsert');
Route::get('/edit/Category/{category_id}','CategoryController@editcategory');
Route::get('/delete/Category/{category_id}','CategoryController@deletecategory');
Route::post('edit/Category/insert','CategoryController@editCategoryinsert');
