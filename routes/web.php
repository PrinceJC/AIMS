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

Route::get('/superadmin', function(){
    return 'you are super  admin' ;
 })->middleware(['auth','auth.superadmin']);


 Route::group(['middleware' => ['auth', 'auth.superadmin']], function(){

    Route::get('registered-users','Admin\UserController@register');
    Route::get('role-edit/{id}','Admin\UserController@edit');

});
Route::resource('/vehicles', 'VehicleController');
Route::resource('/facilities', 'FacilityController');
Route::resource('/vrs', 'VrsController');
Route::resource('/adminfac', 'AdminFacController');
Route::resource('/adminveh', 'AdminVehController');
Route::resource('/adminvrs', 'AdminVrsController');
Route::resource('/superadmin', 'SuperAdminController');
Route::resource('/adminzoom', 'AdminZoomController');
Route::resource('/superadmin2', 'SampleController');
Route::resource('/zooms', 'ZoomController');
Route::resource('/calendar', 'CalendarController');
Route::resource('/calendarfac', 'FacilityCalendarController');
Route::resource('/zoomcalendar', 'ZoomCalendarController');
Route::resource('/usercalendar', 'UserCalendarController');
Route::resource('/usercalendarfac', 'USerCalendarfacController');
Route::resource('/userzoomcalendar', 'UserZoomCalendarController');
Route::resource('/usercalendar2', 'UserCalendar2Controller');

Route::get('/load-event', 'ZoomController@index')->name('index');

Route::get('/facilitycat', 'SampleController@facilitycat');
Route::post('/facilitycat', 'SampleController@addfacilitycat');
Route::get('/vehiclecat', 'SampleController@vehiclecat');
Route::post('/vehiclecat', 'SampleController@addvehiclecat');
Route::get('/equipmentcat', 'SampleController@equipmentcat');
Route::post('/equipmentcat', 'SampleController@addequipmentcat');

Route::get('/vehicleres', 'VehicleController@index')->name('vehicleres');
Route::get('/facilitycat', 'SampleController@facilitycat')->name('facilitycat');
Route::get('/facilityres', 'FacilityController@index')->name('facilityres');
Route::get('/reservationlist', 'HomeController@reservationlist')->name('reservationlist');
Route::get('/maintenancelist', 'HomeController@maintenancelist')->name('maintenancelist');

Route::get('/addeventurl', 'CalendarController@display');
Route::get('/displaydata', 'CalendarController@show');

Route::get('/adminveh/viewdata', 'AdminVehController@view');
Route::get('/addfaceventurl', 'FacilityCalendarController@display');
Route::get('/displayfacdata', 'FacilityCalendarController@show');


Route::get('/zoomaddeventurl', 'ZoomCalendarController@display');
Route::get('/zoomdisplaydata', 'ZoomCalendarController@show');

Route::get('/userdisplaydata', 'UserCalendarController@show');
Route::get('/userdisplayfacdata', 'UserCalendarfacController@show');
Route::get('/userzoomdisplaydata', 'UserZoomCalendarController@show');
Route::get('/userdisplay2data', 'UserCalendar2Controller@show');


Route::get('/vehiclemain', 'VehicleController@vehiclemain')->name('vehiclemain');
Route::get('/equipment', 'EquipmentController@index')->name('equipment');
Route::get('/vehicleres','VehicleController@index')->name('vehicleres');
Route::post('/store','VehicleController@store')->name('store');

Route::get('vehicles/pdf', 'VehicleController@pdf');

Route::get('/printfacility/{id}','FacilityController@printfacility');
Route::get('/printvehicle/{id}','VehicleController@printvehicle');
Route::get('/printvehicleadmin/{id}','AdminVehController@printadminvehicle');
Route::get('/printvrs/{id}','VrsController@printvrs');

Route::get('/printadminfac/{id}','AdminFacController@printadminfac');
Route::get('resize', 'ResizeController@index');

Route::post('resize/resize_image', 'ResizeController@resize_image');
Route::post('vehicles/resize_image', 'VehicleController@resize_image');

Route::post('adminveh/fileview','AdminvehController@store')->name('fileview');

Route::post('adminveh/download','AdminvehController@store')->name('download');
