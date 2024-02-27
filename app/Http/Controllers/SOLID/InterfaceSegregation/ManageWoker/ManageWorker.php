<?php

namespace App\Http\Controllers\SOLID\InterfaceSegregation\ManageWoker;

class ManageWorker
{
    public function manage(ManageableInterface $worker)
    {
       return $worker->beManage();
    }
}
