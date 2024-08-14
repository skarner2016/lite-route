<?php

namespace App\Controllers;

class IndexController
{
    public function index()
    {
        return json_encode([
            'class'  => __CLASS__,
            'method' => __METHOD__,
            'file'   => __FILE__,
            'code'   => 200,
        ]);
    }
}
