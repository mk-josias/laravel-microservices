# Laravel Microservices

Laravel applications working together as microservices: signed RPC through shared contracts, ordered
events with an outbox, and read-only copies of each other's rows.

This repository holds the packages, each published on its own:

| Package | Composer | |
|---|---|---|
| [core](packages/core) | `mk-josias/laravel-microservices` | contracts, RPC, events, outbox, copies; `array` and `null` stream drivers |
| [redis-event-stream](packages/redis-event-stream) | `mk-josias/redis-event-stream` | the `redis` events driver, on Redis Streams |
| [queue-event-stream](packages/queue-event-stream) | `mk-josias/queue-event-stream` | the `queue` events driver, on Laravel queues |

[examples/](examples) runs iam, notifications and analytics as three applications behind a Node gateway, in CI.

```bash
composer install
composer check   # pint, phpstan and the tests of every package
```
