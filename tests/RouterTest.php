<?php

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testRoute()
    {
        $_SERVER['REQUEST_URI'] = 'index/index';

        $router = new Skarner2016\Route\Route();
        $router->addSimple();
        $json = $router->run();

        $res = json_decode($json, true);
        $this->assertIsArray($res);
        $this->assertArrayHasKey('code', $res);
        $this->assertEquals('200', $res['code']);
    }
}
