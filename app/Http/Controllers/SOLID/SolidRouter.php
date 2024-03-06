<?php

namespace App\Http\Controllers\SOLID;


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
use Laravel\Lumen\Routing\Router;

/**
 * SOLID Principles in PHP (https://laracasts.com/series/solid-principles-in-php)
 * SOLID represents a series of guidelines that developers can use to, if done well, simplify and clarify their code.
 * While certainly not laws, understanding these concepts will make you a better developer.
 */
class SolidRouter
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function begin(): void
    {
        $this->singleResponsibility();
        $this->openClosed();
        $this->liskovSubstitution();
        $this->interfaceSegregation();
        $this->dependencyInversion();
    }

    // Single Responsibility: A class should have one, and only one reason to change.
    public function singleResponsibility(): void
    {
        $this->router->get('solid/single-responsibility', function () {
            $report = new SalesReporter(new SalesRepository());
            $begin = Carbon::now()->setDays(10);
            $end = Carbon::now();
            return $report->between($begin, $end, new HtmlOutput);
        });

    }

    // Open-Closed: Entities should be open for extension, but closed for modification. (change behavior without modifying source code)
    // Separate extensible behavior behind an interface, and flip the dependencies.
    public function openClosed(): void
    {

        $this->router->get('solid/open-closed/calculator', function () {
            $calculator = new AreCalculator();
            return $calculator->calculate([new Square(20, 30), new Circle(50)]);
        });
        $this->router->get('solid/open-closed/checkout', function () {
            $checkout = new Checkout();
            return $checkout->begin(new Receipt(40), new PayPalPaymentMethod());
        });
    }

    // Liskov Substitution: Derived classes must be substitutable for their base classes.
    /**
     * 1. Signature must match
     * 2. Preconditions can't be greater
     * 3. Post conditions at least equal to
     * 4. Exception types must match
     */
    public function liskovSubstitution(): void
    {
        $this->router->get('solid/liskov-substitution', function () {
            $report = new LiskovSubstitution3();
            return $report->getData(new FileLessonRepository());
        });

    }
    // 4. Interface Segregation: A client should not be forced to implement interface that it doesn't use.
    public function interfaceSegregation(): void
    {

        $this->router->get('solid/interface-segregation', function () {
            $worker = new ManageWorker();
            return $worker->manage(new HumanWorker());
        });
    }

    // 5. Dependency Inversion: Depend on abstractions, not on concretions. (Decoupling Code)
    /**
     * High level code should never have to depend on low level code (One class should never be forced to depend on
     * a specific implementation instead it should depend on a contract or an abstractions or an interface )
     * - High level code: isn't as concerned with details
     * - Low level code: is more concerned with details and specifics
     * All of this is about decoupling code
     */
    public function dependencyInversion(): void
    {

        $this->router->get('solid/dependency-inversion', function () {
            $reminder = new PasswordReminder(new DbConnection());
            return $reminder->reset();
        });
    }
}
