<?php

namespace App\Http\Controllers\SOLID\InterfaceSegregation\ManageWoker;

class AndroidWorker implements WorkableInterface, ManageableInterface
{

    public function beManage()
    {
        $this->work();
    }

    public function work()
    {
        return "Android working";
    }
}
