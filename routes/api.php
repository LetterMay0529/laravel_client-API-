<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
-GET/client/{client}	                    Returns the record of a specific client
-GET/client/balance	                        Returns all the clients with an outstanding loan balance arranged by name
-GET/client/dividend	                    Returns all the clients' names and dividends The dividend is computed by 2.3% of their total capitalization
-POST/client	                            Insert a new client
-PATCH/client/{client}/deposit/{amount} 	Adds the {amount} to the capitalization of a particular {client}.
*/

Route::get('client/{client}', 'ClientController@show');
Route::get('client/balance', 'ClientController@balance');
Route::get('client/dividend', 'ClientController@dividend');
Route::post('client', 'ClientController@store');
Route::patch('client/{client}/deposit/{amount}', 'ClientController@deposit');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
