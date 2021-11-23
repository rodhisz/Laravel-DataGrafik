<?php

use App\Charts\WisataChart;
use Illuminate\Support\Facades\Http;
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
    return view('welcome');
});

Route::get('/grafik2', function () {

    $response = Http::get('https://ict-juara.herokuapp.com/api/wisata');
    $respond = json_decode($response);

    $categories = [];

    foreach ($respond->data as $wis) {
        $categories[] = $wis->nama_wisata;
    }

    $harga = [];

    foreach ($respond->data as $wis) {
        $harga[] = $wis->harga;
    }



    return view('high-chart', compact('categories', 'harga'));
});

Route::get('/grafik1', function () {

    $api = Http::get('https://ict-juara.herokuapp.com/api/wisata')->json();
    $wisata = collect($api);

    $labels = $wisata->flatten(1)->pluck('nama_wisata');
    $data = $wisata->flatten(1)->pluck('harga');

    $color = $labels->map(function ($item) {
        return $acak = '#'. substr(md5(mt_rand()), 0, 6);
    });

    $chart = new WisataChart;
    $chart->labels($labels);
    $chart->dataset('HTM Wisata', 'line', $data)->backgroundColor($color);

    // return dd ($labels);
    return view('htm', compact('chart'));
});
