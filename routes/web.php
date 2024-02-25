<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Http\Controllers\SOLID\SR\HtmlOutput;
use App\Http\Controllers\SOLID\SR\SalesReporter;
use App\Http\Controllers\SOLID\SR\SalesRepository;
use Carbon\Carbon;

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// Single Responsibility
$router->get('solid/single', function () {
    $report = new SalesReporter(new SalesRepository());
    $begin = Carbon::now()->setDays(10);
    $end = Carbon::now();
    return $report->between($begin,$end, new HtmlOutput);
});
