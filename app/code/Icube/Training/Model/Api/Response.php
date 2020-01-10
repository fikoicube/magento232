<?php

namespace Icube\Training\Model\Api;

class Response implements \Icube\Training\Api\ResponseInterface
{
    public function getNik()
    {
        return $this->nik;
    }

    public function setNik($nik)
    {
        $this->nik = $nik;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}