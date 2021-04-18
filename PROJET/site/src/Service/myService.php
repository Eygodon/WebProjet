<?php


namespace App\Service;


class myService
{
    public function invertMyMessage(): string
    {
        $source = "Shrekos";
        return strrev($source);
    }
}