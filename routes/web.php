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

use App\Http\Controllers\SOLID\OpenClosed\AreaCalculator\AreCalculator;
use App\Http\Controllers\SOLID\OpenClosed\AreaCalculator\Circle;
use App\Http\Controllers\SOLID\OpenClosed\AreaCalculator\Square;
use App\Http\Controllers\SOLID\OpenClosed\Checkout\CashPaymentMethod;
use App\Http\Controllers\SOLID\OpenClosed\Checkout\Checkout;
use App\Http\Controllers\SOLID\OpenClosed\Checkout\PayPalPaymentMethod;
use App\Http\Controllers\SOLID\OpenClosed\Checkout\Receipt;
use App\Http\Controllers\SOLID\SingleResponsibility\HtmlOutput;
use App\Http\Controllers\SOLID\SingleResponsibility\SalesReporter;
use App\Http\Controllers\SOLID\SingleResponsibility\SalesRepository;
use Carbon\Carbon;

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// Single Responsibility: A class should have one, and only one reason to change.
$router->get('solid/single-responsibility', function () {
    $report = new SalesReporter(new SalesRepository());
    $begin = Carbon::now()->setDays(10);
    $end = Carbon::now();
    return $report->between($begin,$end, new HtmlOutput);
});

// Open-Closed: Entities should be open for extension, but closed for modification. (change behavior without modifying source code)
// Separate extensible behavior behind an interface, and flip the dependencies.
$router->get('solid/open-closed/calculator', function () {
    $calculator = new AreCalculator(new SalesRepository());
    return $calculator->calculate([new Square(20,30), new Circle(50)]);
});
$router->get('solid/open-closed/checkout', function () {
    $checkout = new Checkout();
    return $checkout->begin(new Receipt(40), new PayPalPaymentMethod());
});
