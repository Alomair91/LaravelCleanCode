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

use App\Http\Controllers\SOLID\DependencyInversion\DbConnection;
use App\Http\Controllers\SOLID\DependencyInversion\PasswordReminder;
use App\Http\Controllers\SOLID\InterfaceSegregation\ManageWoker\HumanWorker;
use App\Http\Controllers\SOLID\InterfaceSegregation\ManageWoker\ManageWorker;
use App\Http\Controllers\SOLID\LiskovSubstitution\FileLessonRepository;
use App\Http\Controllers\SOLID\LiskovSubstitution\LiskovSubstitution3;
use App\Http\Controllers\SOLID\OpenClosed\AreaCalculator\AreCalculator;
use App\Http\Controllers\SOLID\OpenClosed\AreaCalculator\Circle;
use App\Http\Controllers\SOLID\OpenClosed\AreaCalculator\Square;
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

// Liskov Substitution: Derived classes must be substitutable for their base classes.
/**
 * 1. Signature must match
 * 2. Preconditions can't be greater
 * 3. Post conditions at least equal to
 * 4. Exception types must match
 */
$router->get('solid/liskov-substitution', function () {
    $report = new LiskovSubstitution3();
    return $report->foo(new FileLessonRepository());
});

// 4. Interface Segregation: A client should not be forced to implement interface that it doesn't use.
$router->get('solid/interface-segregation', function () {
    $worker = new ManageWorker();
    return $worker->manage(new HumanWorker());
});

// 5. Dependency Inversion: Depend on abstractions, not on concretions.
/**
 * High level code should never have to depend on low level code (One class should never be forced to depend on
 * a specific implementation instead it should depend on a contract or an abstractions or an interface )
 * - High level code: isn't as concerned with details
 * - Low level code: is more concerned with details and specifics
 */
$router->get('solid/dependency-inversion', function () {
    $reminder = new PasswordReminder(new DbConnection());
    return $reminder->reset();
});
