<?php
namespace Icube\Training\Helper;

use Icube\Training\Helper\General as GeneralOriginal;

class GeneralOverride extends GeneralOriginal
{
    public function funcTest()
    {
        return "Hello There!";
    }
}