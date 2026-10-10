<?php

declare(strict_types=1);

namespace HttpRpc\Tests;

use HttpRpc\HttpRpcServiceProvider;
use Microservices\Tests\TestCase as CoreTestCase;

/** The core's `orders` application, with the http RPC driver installed. */
abstract class TestCase extends CoreTestCase
{
    /** @return list<class-string> */
    protected function getPackageProviders($app): array
    {
        return [...parent::getPackageProviders($app), HttpRpcServiceProvider::class];
    }
}
