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


/**
 * SOLID principles
 * S single resposibility
 * category
 *
 * /category/{cat_id} => model => folder view index / details / search /
 * /category/{id}/subcategory/{sub_id}
 * /categroy/search
 * /search/category/{id}/{keyword}/
 *
 *
 */

Route::group(['middleware'=> 'web'], function(){

    #datatable ajax
    #add it when I have new table
    Route::get('/adminpanel/users/data', ['as'=>'adminpanel.users.data','uses'=> 'UsersController@anyData']);
    Route::get('/adminpanel/item/data', ['as'=>'adminpanel.item.data','uses'=> 'ItemController@anyData']);
    Route::get('/adminpanel/city/data', ['as'=>'adminpanel.city.data','uses'=> 'CityController@anyData']);
    Route::get('/adminpanel/subcategory/data', ['as'=>'adminpanel.subcategory.data','uses'=> 'SubCategoriesController@anyData']);
    Route::get('/adminpanel/category/data', ['as'=>'adminpanel.category.data','uses'=> 'CategoriesController@anyData']);
    Route::get('/adminpanel/contact/data', ['as'=>'adminpanel.contact.data','uses'=> 'ContactController@anyData']);
    #main admin
    Route::get('/adminpanel', 'AdminController@index');

     #statics
    Route::get('/adminpanel/buYear/statics', 'AdminController@showYearStatics');

    #users
    Route::resource('/adminpanel/users', 'UsersController');
    Route::put('adminpanel/users/{id}','UsersController@update');
    Route::get('adminpanel/users/{id}/delete','UsersController@destroy');
//    Route::delete('adminpanel/users/{id}','UsersController@destroy');

    Route::post('/adminpanel/users/changePassword','UsersController@updatePass');

    #settingsite
    Route::get('/adminpanel/sitesetting', 'SiteSettingController@index');
    Route::post('/adminpanel/sitesetting', 'SiteSettingController@store');
    Route::get('adminpanel/item/{id}/delete','ItemController@destroy');

    #items
    Route::delete('adminpanel/item/picture/{id}','PicturesController@destroy');
    Route::resource('/adminpanel/item', 'ItemController',['except' =>['index','show']]);
    Route::get('/adminpanel/item/{id?}', 'ItemController@index');
    #cities
    Route::resource('/adminpanel/city', 'CityController');
    Route::get('adminpanel/city/{id}/delete','CityController@destroy');

    #subcategory
    Route::resource('/adminpanel/subcategory', 'SubCategoriesController',['except' =>['index','show']]);
    Route::get('/adminpanel/subcategory/{id?}', 'SubCategoriesController@index');
    Route::get('adminpanel/subcategory/{id}/delete','SubCategoriesController@destroy');


    #category
    Route::resource('/adminpanel/category', 'CategoriesController',['except' =>['index','show']]);
    Route::get('/adminpanel/category/{id?}', 'CategoriesController@index');
    Route::get('adminpanel/category/{id}/delete','CategoriesController@destroy');

    #contacts
    Route::resource('/adminpanel/contact', 'ContactController');
    Route::put('adminpanel/contact/{id}','ContactController@update');
    Route::get('adminpanel/contact/{id}/delete','ContactController@destroy');

    Route::post('/adminpanel/upload/uploadFiles', 'PicturesController@multiple_upload');


});
////

Route::group(['middleware'=> 'web'], function(){
    Auth::routes();
    Route::get('/', function(){
//        $subcategories = \App\SubCategory::all();
        $item = \App\Models\Item::where('status', 1)->latest()->with('firstPhoto','cities')->take(3)->get();
        return view('welcome',compact('item'));
    });
    Route::get('/ShowAllBuilding', 'ItemController@getProducts');
    Route::get('/FilterAllProducts', 'ItemController@FilterAllProducts');
    Route::get('/type/{type}', 'ItemController@showBysubcategory');
    Route::get('/condition/{condition}', 'ItemController@showByCondition');
    Route::get('/SingleBuilding/{id}', 'ItemController@showSingle');
    Route::get('/ajax/item/information',  'ItemController@getAjaxInfo');
    Route::get('/contact',  'HomeController@contact');
    Route::post('/contact',  'ContactController@store');


    Route::get('/user/buildingShow',  'ItemController@showUserBuilding')->middleware('auth');
    Route::get('/user/editSetting',  'UsersController@usereditInfo')->middleware('auth');
    Route::patch('/user/editSetting',  'UsersController@userUpdateProfile')->middleware('auth');
    Route::get('/user/edit/building/{id}',  'ItemController@userEditBuilding')->middleware('auth');
    Route::patch('/user/update/building',  'ItemController@userUpdateBuilding')->middleware('auth');


    Route::get('/search',  function(\Illuminate\Http\Request $request){
        $search = $request->search;
        $transaction = $request->trasaction;
        $subcategory = $request->subcategory;
        $city = $request->city;


        $query = new \App\Models\Item();

        if(isset($request->search)) {
            $query = $query
                ->selectRaw('*,MATCH(name,large_ds) AGAINST ("'.$search.'" IN NATURAL LANGUAGE MODE) as score')
                ->whereRaw('MATCH(name,large_ds) AGAINST ("'.$search.'" IN BOOLEAN MODE)')
                ->orderBy('score','desc');

        }


        if($subcategory !=0)
            $query = $query->where('category_id',$subcategory);

        if($city !=0)
            $query = $query->where('city_id',$subcategory);

        if($transaction !=0)
            $query = $query->where('transaction',$transaction);


        $itemAll=$query->paginate(30);
        return view('web.item.all', compact('itemAll','search','subcategories','city','transaction'));
        //return view('search',compact('results','search','subcategory'));
        //dd(Search::search(
        //"Bu" ,
        //['bu_name' , 'bu_large_ds'] ,
        //$request->search ,
        //null,
        //['id'  , 'asc'] ,
        //false
        // )->where('subcategory_id',$request->subcategory)->get());

    });
});


//Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
