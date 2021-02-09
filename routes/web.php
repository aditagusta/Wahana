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
    return view('auth.login');
})->name('login');

Route::post('/login', 'Autentikasi@cekLogin')->name('cek_login');

// Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Autentikasi@logout')->name('logout');


//pengunjung

Route::resource('visitor', 'VisitorController');

//Tiket

Route::resource('wahana', 'WahanaController');
Route::post('/wahana/{id}/update', 'wahanaController@update')->name('wahana.update');
Route::get('changeStatus', 'WahanaController@changeStatus');

//jabatan
Route::resource('position', 'PositionController');

// schedule
Route::get('/schedule', 'ScheduleController@index')->name('schedule');
Route::get('/schedule/add', 'ScheduleController@create')->name('create_schedule');
Route::post('/schedule/action', 'ScheduleController@store')->name('addschedule');
Route::get('/deleteschedule/{date?}/{wahana?}/{staff?}', 'ScheduleController@destroy')->name('deleteschedule');
Route::get('/editschedule/{date?}', 'ScheduleController@edit')->name('editschedule');
Route::post('/updateschedule/{date}', 'ScheduleController@update')->name('updateschedule');

Route::post('/position/{id}/update', 'PositionController@update')->name('position.update');

//pegawai
Route::resource('employee', 'EmployeeController');

Route::post('/employee/{id}/update', 'EmployeeController@update')->name('employee.update');

//TopUp
Route::get('/topup/print', 'TopupController@history_topupprint')->name('topup.print');
Route::resource('topup', 'TopupController');
date_default_timezone_set("ASIA/JAKARTA");

//Transaction
Route::resource('transaction', 'TransactionController');

// Staff Operators
Route::get('/so', 'StaffOperatorController@index')->name('so');
Route::get('/staff/add', 'StaffOperatorController@create')->name('create_so');
Route::post('/staff/action', 'StaffOperatorController@store')->name('addso');
Route::get('/deleteso/{date?}/{wahana?}/{staff?}', 'StaffOperatorController@destroy')->name('deleteso');


//Pembayaran
Route::resource('pembayaran', 'PembayaranController');

Route::get('/pembayaran', 'PembayaranController@index')->name('pembayaran.index');
Route::delete('/pembayaran/destroy/{id}', 'PembayaranController@destroy')->name('pembayaran.destroy');


Route::get('/user', 'UserController@user')->name('user');
Route::get('/user/create', 'UserController@usercreate')->name('usercreate');
Route::post('/user/create/add', 'UserController@usercreateadd')->name('usercreateadd');


//report
Route::get('/report/topup', 'ReportController@history_topupindex')->name('report.topup_report');
Route::get('/report/operator', 'ReportController@indexoperator')->name('report.operator');
Route::get('/report/operator/print', 'ReportController@indexoperator')->name('report.operator');

Route::get('/report/transaction_report', 'ReportController@transactionindex')->name('report.transaction_report');

Route::get('/visitor/cetak/qr/{id}', 'VisitorController@cetakqrvisitor')->name('visitor.cetakqr');


Route::get('/akun/aktivasi/{token}', 'VisitorController@aktivasiakun')->name('akun.aktivasi');

Route::get('/staff-wahana', 'StaffWahanaController@index')->name('staffwahana.index');
Route::post('/staff-wahana', 'StaffWahanaController@store')->name('staffwahana.store');
Route::get('/staff-wahana/hapus/{employee_nik}', 'StaffWahanaController@delete')->name('staffwahana.delete');

//tools wahana
Route::resource('tools', 'ToolsController');
Route::post('/tools/{id}/update', 'ToolsController@update')->name('tools.update');

//history of repairs
Route::resource('repair', 'HistoryRepairController');
Route::post('/repair/{id}/update', 'HistoryRepairController@update')->name('repair.update');
