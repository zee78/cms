<?php

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/' , 'AdminController@index');

// *********************** rback ****************************

// ******************** roles ******************

Route::get('/roles/select2-roles' , 'Rback\Roles\RoleController@select2');
Route::get('/roles/datatable' , 'Rback\Roles\RoleController@datatable');
Route::resource('/roles' , 'Rback\Roles\RoleController');

// **********************permissions ********************************

Route::get('/permissions/datatable' , 'Rback\Permissions\PermissionController@datatable');
Route::resource('/permissions' , 'Rback\Permissions\PermissionController');

// **********************users ********************************

Route::get('/employees/datatable' , 'Rback\Users\EmployeeController@datatable');
Route::resource('/employees' , 'Rback\Users\EmployeeController');

//********************* Research ******************//
Route::group(['prefix' => 'research'], function () {
	Route::resource('/add-research-task' , 'Research\ResearchController');

	Route::resource('/funders' , 'Research\FunderController');

	Route::resource('/training-form' , 'Research\TrainingFormController');
});

//********************* Mady SkinCare ******************//
Route::group(['prefix' => 'skincare'], function () {
	Route::resource('/add-formulation', 'Skincare\FormulationController');
	Route::resource('/inventory/batch', 'Skincare\Inventory\BatchController');
	Route::resource('/inventory/chemical', 'Skincare\Inventory\ChemicalController');
	Route::resource('/inventory/equipment', 'Skincare\Inventory\EquipmentController');
	Route::resource('/inventory/glasssware', 'Skincare\Inventory\GlassWareController');
	Route::resource('/inventory/soldstatus', 'Skincare\Inventory\SoldStatusController');

});	
Route::group(['prefix' => 'skincare'], function () {
	// Route::get('/add-formulation', 'AdminController@add_formulation');
	// Route::get('/add-chemicals', 'AdminController@add_chemicals');
	// Route::get('/add-glassware', 'AdminController@add_glassware');
	// Route::get('/add-equipment', 'AdminController@add_equipment');
	// Route::get('/add-batch', 'AdminController@add_batch');
	// Route::get('/add-sold-status', 'AdminController@add_sold_status');
	// Route::get('/add-vendors', 'AdminController@add_vendors');
});
// Route::get('/{page}', 'AdminController@index');
Auth::routes();

Route::resource('/logout', 'Auth\LogoutController');
