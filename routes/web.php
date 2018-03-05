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




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

// Route::resource('posts', 'PostController');


Route::resource('categories','CategoryController');
Route::get('subcategories/list/{id}',['as' => 'subcategories.list','uses' => 'SubCategoryController@list']);
Route::get('subcategories/add/{id}',['as' => 'subcategories.add','uses' => 'SubCategoryController@add']);
Route::resource('subcategories','SubCategoryController');
Route::resource('companies','CompanyController');
Route::resource('publications','PublicationController');
Route::resource('tags','TagController');
Route::get('sections/list/{id}',['as' => 'sections.list','uses' => 'PublicationSectionController@list']);
Route::get('sections/add/{id}',['as' => 'sections.add','uses' => 'PublicationSectionController@add']);
Route::resource('sections','PublicationSectionController');
Route::resource('publication/upload','PublicationUploadController');
Route::get('/publication/sections/{id}',array('as'=>'section.ajax','uses'=>'PublicationUploadController@sections'));
Route::resource('user/publication','UserPublicationAssignController');
Route::get('user/publications/{id}',['as' => 'user.publication.list','uses' => 'UserPublicationAssignController@list']);
Route::get('user/{user_id}/publication/{publication_id}', [
'as' => 'user.publication.remove', 'uses' => 'UserPublicationAssignController@remove']);


Route::resource('article','ArticleController');
Route::post('article/{id}','ArticleController@update');
Route::get('pending/article','ArticleController@pending')->name('pending.article');
Route::get('pending/processed','ArticleController@processed')->name('processed.article');
Route::get('pending/approved','ArticleController@approved')->name('approved.article');

Route::get('article/{id}','ArticleController@show');
Route::get('showarticle/{id}','ArticleController@showarticle')->name('showarticle');;
Route::get('article/publication/{id}','ArticleController@showPublication');
Route::post('croped-articles','ArticleController@showCroped');

Route::resource('client','ClientController');
Route::post('client/getcompany','ClientController@getCompany');

Route::resource('highlight','HighlightController');
Route::get('highlight/list/{id}',['as' => 'highlight.list','uses' => 'HighlightController@highlights']);
Route::get('highlight/add/{id}',['as' => 'highlight.add','uses' => 'HighlightController@add']);

Route::resource('clientcategory','ClientCategoryController');
Route::get('clientcategory/list/{id}',['as' => 'clientcategory.list','uses' => 'ClientCategoryController@category']);
Route::get('clientcategory/add/{id}',['as' => 'clientcategory.add','uses' => 'ClientCategoryController@add']);

Route::resource('clientemail','ClientEmailController');
Route::get('clientemail/list/{id}','ClientEmailController@maillist')->name('clientemail.list');
Route::get('clientemail/add/{id}','ClientEmailController@add')->name('clientemail.add');

