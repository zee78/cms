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

Route::get('/roles/roles-assign-permissions/{id}' , 'Rback\Roles\RoleController@assignPermission');
Route::post('/roles/roles-assign-permissions-to-role' , 'Rback\Roles\RoleController@assignPermissionToRole');

Route::resource('/roles' , 'Rback\Roles\RoleController');

// **********************permissions ********************************

Route::get('/permissions/datatable' , 'Rback\Permissions\PermissionController@datatable');
Route::resource('/permissions' , 'Rback\Permissions\PermissionController');

// **********************users ********************************

Route::get('/employees/datatable' , 'Rback\Users\EmployeeController@datatable');
Route::resource('/employees' , 'Rback\Users\EmployeeController');

//********************* Research ******************//
Route::group(['prefix' => 'research'], function () {
	Route::post('/research-task/change-status', 'Research\ResearchController@changeStatus');
	Route::get('/research-task/datatable' , 'Research\ResearchController@datatable');
	Route::resource('/research-task' , 'Research\ResearchController');
	Route::post('/funders/change-status', 'Research\FunderController@changeStatus');
	Route::get('/funders-datatable' , 'Research\FunderController@datatable');
	Route::resource('/funders' , 'Research\FunderController');
	Route::post('/training-form/change-status', 'Research\TrainingFormController@changeStatus');
	Route::get('/training-form/datatable' , 'Research\TrainingFormController@datatable');
	Route::resource('/training-form' , 'Research\TrainingFormController');
});

//********************* Mady SkinCare ******************//
Route::group(['prefix' => 'skincare'], function () {

	Route::get('/inventory/batch/datatable', 'Skincare\Inventory\BatchController@datatable');

	Route::resource('/inventory/batch', 'Skincare\Inventory\BatchController');
	Route::get('/inventory/chemical/datatable', 'Skincare\Inventory\ChemicalController@datatable');
	Route::resource('/inventory/chemical', 'Skincare\Inventory\ChemicalController');
	Route::get('/inventory/equipment/datatable', 'Skincare\Inventory\EquipmentController@datatable');
	Route::resource('/inventory/equipment', 'Skincare\Inventory\EquipmentController');
	Route::get('/inventory/glasssware/datatable', 'Skincare\Inventory\GlassWareController@datatable');
	Route::resource('/inventory/glasssware', 'Skincare\Inventory\GlassWareController');
	Route::get('/inventory/soldstatus/datatable', 'Skincare\Inventory\SoldStatusController@datatable');
	Route::resource('/inventory/soldstatus', 'Skincare\Inventory\SoldStatusController');
	Route::get('/formulation/datatable', 'Skincare\FormulationController@datatable');
	Route::resource('/formulation', 'Skincare\FormulationController');

	Route::get('/vendors/select2', 'Skincare\Vendor\VendorController@select2');
	Route::get('/vendors/datatable', 'Skincare\Vendor\VendorController@datatable');
	Route::resource('/vendors', 'Skincare\Vendor\VendorController');

	Route::post('/purchase-order/change-order-status', 'Skincare\PurchaseOrder\PurchaseOrderController@changeOrderStatus');
	Route::get('/purchase-order/datatable', 'Skincare\PurchaseOrder\PurchaseOrderController@datatable');
	Route::resource('/purchase-order', 'Skincare\PurchaseOrder\PurchaseOrderController');
	Route::get('/costing/datatable', 'Skincare\Costing\CostingController@datatable');
	Route::resource('/costing', 'Skincare\Costing\CostingController');
	Route::get('/trend-analysis/datatable', 'Skincare\TrendAnalysis\TrendAnalysisController@datatable');
	Route::resource('/trend-analysis', 'Skincare\TrendAnalysis\TrendAnalysisController');

});
//********************* Consultancy *********************//
Route::group(['prefix' => 'consultancies'], function () {
	Route::get('/consultancy/datatable', 'Consultancy\ConsultancyController@datatable');
	Route::resource('/consultancy', 'Consultancy\ConsultancyController');
});
//********************* CRO *********************//
Route::group(['prefix' => 'cro'], function () {
	Route::get('/project/datatable', 'CRO\ProjectController@datatable');
	Route::resource('/project', 'CRO\ProjectController');
});
//********************* CRO *********************//
Route::group(['prefix' => 'community-awareness'], function () {
	Route::get('/project/datatable', 'CommunityAwareness\ProjectController@datatable');
	Route::resource('/project', 'CommunityAwareness\ProjectController');
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
