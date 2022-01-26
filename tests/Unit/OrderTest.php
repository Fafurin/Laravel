<?php

namespace Tests\Unit;

use App\Models\Customer;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $model = new Customer('Ivan', 'Petrov', '81234567890', 'ipetro@petro.i', 'OrderInfo...');

        $this->assertTrue(true);
    }
}
