<?php

use App\Exports\FilterReportExport;
use App\Exports\MaterialExport;
use App\Exports\PreExport;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/',[DashboardController::class, 'index'])->name('home');
Route::view('prefabricado','prefabricado.prefabricadoList')->name('prefabricado');
Route::view('materiales','material.materialList')->name('material');
Route::view('entrada','kardex.entrada.entradaAdd')->name('entrada');
Route::view('salida','kardex.salida.salidaAdd')->name('salida');
Route::view('reporte/general','reporte.generalReport')->name('reporte.general');
Route::get('excelPre',function(){

    return Excel::download(new PreExport,'prefabricados.xlsx');

})->name('excelPre');
Route::get('excelMaterial',function(){

    return Excel::download(new MaterialExport,'materiales.xlsx');

})->name('excelMaterial');
Route::get('filter',function(){

    //return Excel::download(new FilterReportExport,'filter.xlsx');

})->name('filter');

Route::get('test', function () {
    return view('kardex.entrada.entrada-view');
});

Route::get('/domain', function () {
     $var = [

        "34"=>2

    ];

    return $var;
})->domain('blog.'.env('APP_URL'));

Route::view('lista', 'policy');