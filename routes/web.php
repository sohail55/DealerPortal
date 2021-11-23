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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::group(['prefix' => 'administrator'], function () {
    Route::post('login', 'LoginController@login')->name('adminLogin');
    Route::get('signout', 'LoginController@signout')->name('signout');
});
Route::get('signIn', 'LoginController@signIn')->name('signIn');
Route::get('signUp', 'LoginController@signUp')->name('signUp');
Route::get('forgotPassword', 'LoginController@forgotPassword')->name('forgotPassword');
Route::post('memberSignup', 'LoginController@memberSignup')->name('memberSignup');
Route::post('recoverPassword', 'LoginController@recoverPassword')->name('recoverPassword');
Route::get('changePassword', 'LoginController@changePassword')->name('changePassword');
Route::post('updatePassword', 'LoginController@updatePassword')->name('updatePassword');
Route::get('otpVerify', 'LoginController@otpVerify')->name('otpVerify');
Route::get('forgotOTPVerify', 'LoginController@forgotOTPVerify')->name('forgotOTPVerify');
Route::post('resendOTP', 'LoginController@resendOTP')->name('resendOTP');
Route::post('verifyUser', 'LoginController@verifyUser')->name('verifyUser');
Route::get('newPassword', 'LoginController@newPassword')->name('newPassword');
Route::post('updateNewPassword', 'LoginController@updateNewPassword')->name('updateNewPassword');
Route::post('setPassword', 'LoginController@setPassword')->name('setPassword');

Route::any('/paymentConfirmationMobile', 'HomeController@paymentConfirmationMobile')->name('paymentConfirmationMobile');

Route::group(['middleware' => 'usersession'], function () {
Route::post('login', 'LoginController@login')->name('Login');
    
    
    
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('plotsList', 'HomeController@plotsList')->name('plotsList');
    Route::get('/viewLedger/{appid}', 'HomeController@viewLedger')->name('viewLedger');
    Route::get('/getChallanFields/{appid}', 'HomeController@getChallanFields')->name('getChallanFields');
    Route::any('/challanGeneration', 'HomeController@challanGeneration')->name('challanGeneration');
    Route::get('/payOnline', 'HomeController@payOnline')->name('payOnline');
    Route::any('/paymentConfirmation', 'HomeController@paymentConfirmation')->name('paymentConfirmation');
    Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
    Route::get('/editProfile/{id}', 'HomeController@editProfile')->name('editProfile');
    Route::post('/updateProfile', 'HomeController@updateProfile')->name('updateProfile');
    Route::get('/challancc', 'HomeController@challancc')->name('challancc');
    Route::get('/notifications', 'HomeController@notifications')->name('notifications');
    Route::get('/notification_detail/{notification_id}', 'HomeController@notification_detail')->name('notification_detail');
    Route::get('/ndc_detail/{id}', 'HomeController@ndc_detail')->name('ndc_detail');
    Route::get('/ndc_list', 'HomeController@ndc_list')->name('ndc_list');
    Route::get('/newComplaint', 'HomeController@newComplaint')->name('newComplaint');
    Route::post('/saveComplaint', 'HomeController@saveComplaint')->name('saveComplaint');
    Route::get('/complaintStatus', 'HomeController@complaintStatus')->name('complaintStatus');
    Route::get('/complaint_detail/{id}', 'HomeController@complaint_detail')->name('complaint_detail');
    Route::get('/uploadChallan', 'HomeController@uploadChallan')->name('uploadChallan');
    Route::post('/saveChallan', 'HomeController@saveChallan')->name('saveChallan');
    Route::get('/payments', 'HomeController@payments')->name('payments');
    Route::get('/payment_detail', 'HomeController@payment_detail')->name('payment_detail');

    Route::get('pdfview',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));

 });

   
