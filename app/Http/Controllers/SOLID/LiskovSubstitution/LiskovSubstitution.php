<?php
namespace App\Http\Controllers\SOLID\LiskovSubstitution;

class A {
    public function fire() {}
}

class B extends A{
    public function fire() {}
}

function doSomething(A $obj)
{

}
