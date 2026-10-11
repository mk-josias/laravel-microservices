<?php

declare(strict_types=1);

namespace RedisEventStream\Tests;

use Microservices\Tests\TestCase as CoreTestCase;
use RedisEventStream\RedisEventStreamServiceProvider;

/** The core's `orders` application, with the redis driver installed. */
abstract class TestCase extends CoreTestCase
{
    /** @return list<class-string> */
    protected function getPackageProviders($app): array
    {
        return [...parent::getPackageProviders($app), RedisEventStreamServiceProvider::class];
    }
}
