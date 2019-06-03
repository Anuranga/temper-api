<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FlowDataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFlowJsonResult()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }
}
