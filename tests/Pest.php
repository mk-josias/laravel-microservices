<?php

declare(strict_types=1);

use Microservices\Tests\TestCase as CoreTestCase;
use QueueEventStream\Tests\TestCase as QueueTestCase;
use RedisEventStream\Tests\TestCase as RedisTestCase;

// Pest reads only this file: each package's tests get their own base class here.
uses(CoreTestCase::class)->in(__DIR__.'/../packages/core/tests');
uses(RedisTestCase::class)->in(__DIR__.'/../packages/redis-event-stream/tests');
uses(QueueTestCase::class)->in(__DIR__.'/../packages/queue-event-stream/tests');
