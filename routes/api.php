<?php

use App\Exports\FilterReportExport;
use App\Exports\MaterialExport;
use App\Exports\PreExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('prefabricados',function ()
{
    return Excel::download(new PreExport,'prefabricados.xlsx');
});

Route::get('materiales',function ()
{
    return Excel::download(new MaterialExport,'materiales.xlsx');
});

Route::get('transaccion', function () {

    $tipo = $_GET["tipo"];
    $transaccion = $_GET["transaccion"];
    $producto = $_GET["producto"];
    $dateBegin = $_GET["dateBegin"];
    $dateEnd = $_GET["dateEnd"];
    $dateToggle = $_GET["dateToggle"];
    $productoToggle = $_GET["productoToggle"];
    $stringResult =  $_GET["stringResult"]; 

    date_default_timezone_set("America/Lima");
    $dateToTime = getdate();

    foreach ($dateToTime as $key => $value) {
        
        if($key=="seconds"){
           $seconds = $value;
        }
        if ($key=="minutes") {
           $minutes = $value;
        }
        if ( $key=="hours") {
           $hours = $value;
        }
    }


    $time = $hours."h".$minutes."m".$seconds."s";

    $date = date("Y-m-d");

    $fileName = $stringResult."_".$date."_".$time.".xlsx";

    return Excel::download(new FilterReportExport(

                                                    $tipo,
                                                    $transaccion,
                                                    $producto,
                                                    $dateBegin,
                                                    $dateEnd,
                                                    $dateToggle,
                                                    $productoToggle

                                                  ),$fileName);

    
});


