<?php

declare(strict_types=1);

namespace QueueEventStream\Tests;

use Microservices\Tests\TestCase as CoreTestCase;
use QueueEventStream\QueueEventStreamServiceProvider;

/** The core's `orders` application, with the queue driver installed. */
abstract class TestCase extends CoreTestCase
{
    /** @return list<class-string> */
    protected function getPackageProviders($app): array
    {
        return [...parent::getPackageProviders($app), QueueEventStreamServiceProvider::class];
    }
}
