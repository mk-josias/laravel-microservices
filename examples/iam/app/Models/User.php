<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Microservices\Contracts\Shadows\Shadowed;
use Microservices\Traits\ShadowSource;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $api_token
 */
final class User extends Model implements Shadowed
{
    use ShadowSource;

    protected $fillable = ['name', 'email', 'api_token'];

    /** @var list<string> */
    protected array $shadowed = ['name', 'email'];
}
