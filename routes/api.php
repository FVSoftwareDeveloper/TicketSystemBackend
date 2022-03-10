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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // Authorization routes
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    // Handle Employees
    Route::resource('Employees', 'EmployeesController');
    Route::get('AllEmployees', 'EmployeesController@getAllActive');
    Route::get('AllEmployeeStatus', 'EmployeeStatusController@getAllActive');

    // Handle Tickets
    Route::resource('Tickets', 'TicketsController');
    Route::get('AllTickets', 'TicketsController@getAll');
    Route::get('AllTicketStatus', 'TicketStatusController@getAllActive');

    // Handle Ticket Time Entry
    Route::resource('TicketTimes', 'TicketTimesController');
    Route::get('TicketTimesEmployees/{idTicket}', 'TicketTimesController@getTicketTimeEmployeesByTicketId');
    Route::get('AllTicketTimes/{from}/{to}', 'TicketTimesController@getAll');



});
