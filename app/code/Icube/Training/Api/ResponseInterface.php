<?php

namespace Icube\Training\Api;

interface ResponseInterface
{
    /**
     * Get Nik
     * 
     * @return string Data Result
     */
    public function getNik();

    /**
     * Set Nik
     * 
     * @param string $nik NIK Customer
     * @return void
     */
    public function setNik($nik);

    /**
     * Get Name
     * 
     * @return string Data Result
     */
    public function getName();

    /**
     * Set Nik
     * 
     * @param string $name NIK Customer
     * @return void
     */
    public function setName($name);

}