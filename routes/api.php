<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user/api', function (Request $request) {
    return $request->user();
});
 */
Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api'],function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@authenticate')  ;
    Route::post('login/anonymous', 'AuthController@AnonimusAuthenticate')  ;
    Route::get('unauthenticated', function (){
        return response()->json(['error' => 'No autorizado'],403);
    })->name('unauthenticated');
 });

Route::group(['prefix'=>'v1','middleware'=>['auth:api'],'namespace'=>'App\Http\Controllers\Api'],function(){
    Route::resource('admin/roles','AdminRolesAndPermissionsController');
    Route::post('admin/sync/rol/permissions','AdminRolesAndPermissionsController@syncRolPermissions');
    Route::get('admin/role','AdminRolesAndPermissionsController@adminRoles');
    Route::post('admin/role','AdminRolesAndPermissionsController@storeRole');
    Route::put('admin/role/{id}','AdminRolesAndPermissionsController@updateRole');
    Route::delete('admin/role/{id}','AdminRolesAndPermissionsController@deleteRole'); 
    Route::get('admin/permission','AdminRolesAndPermissionsController@adminPermissions');
    Route::post('admin/permission','AdminRolesAndPermissionsController@storePermission');
    Route::put('admin/permission/{id}','AdminRolesAndPermissionsController@updatePermission');
    Route::delete('admin/permission/{id}','AdminRolesAndPermissionsController@deletePermission');

    Route::resource('users','UsersController');  
    
    Route::resource('event/types','EventTypesController');  
    Route::get('event/category/types/{category}','EventTypesController@getEventTypeByCatId'); 

    Route::resource('institutions','InstitutionsController'); 
    Route::post('events/{id}','EventsController@update');
    Route::resource('events','EventsController'); 
   
    Route::get('user','AuthController@getAuthenticatedUser');
    Route::get('user/me','AuthController@me');
   

    Route::get('references/departments','ReferencesController@getDepartments'); 
    Route::get('references/towns/{department}','ReferencesController@getTownsByDepId'); 
    Route::get('references/towns','ReferencesController@getTowns');
    Route::get('references/affects/range','ReferencesController@getAffectsRange'); 
    Route::get('references/contact/types','ReferencesController@getContactTypes');

    Route::resource('references/event/categories','ReferencesDynamicController');  
    Route::get('references/event/categories','ReferencesDynamicController@getEventCategories'); 

    Route::resource('institutional/routes','InstitutionalRoutesController');  

});