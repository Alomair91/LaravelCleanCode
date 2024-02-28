<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

class KindleAdapter implements BookInterface
{

    private EReaderInterface $reader;

    public function __construct(EReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }
}
