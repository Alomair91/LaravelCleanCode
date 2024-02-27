<?php

namespace App\Http\Controllers\SOLID\InterfaceSegregation\ManageWoker;

class HumanWorker implements WorkableInterface, SleepableInterface, ManageableInterface
{

    public function beManage()
    {
        $this->work();
        $this->sleep();
    }

    public function sleep()
    {
        return "Human working";
    }

    public function work()
    {
        return "Human sleeping";
    }
}
