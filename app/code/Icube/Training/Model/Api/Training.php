<?php

namespace Icube\Training\Model\Api;

class Training implements \Icube\Training\Api\TrainingInterface
{
    private $response;

    public function __construct(
        \Icube\Training\Model\Api\ResponseFactory $response
    )
    {
        $this->response = $response;
    }

    public function apiExampleMethod()
    {
        // $return = [
        //     "a",
        //     "b",
        //     "c"
        // ];

        $return = $this->response->create();
        $return->setName('disini');
        $return->setNik('0');

        return $return;
    }
}