<?php

use Carbon\Carbon;
use App\Models\Customer;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// create customer
Route::post('insert_customer',function(Request $request){
    $data=[
        'name'=>$request->name,
        'address'=>$request->address,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'gender'=>$request->gender,
        'age'=>$request->age,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now()
    ];
    Customer::create($data);
    return 'create success...';
});
