<?php

declare(strict_types=1);

namespace Foundation\Iam\Auth;

/** The X-Identity header is `{id}.{exp}.{hmac}`, signed by the gateway once it has authenticated the client. */
final readonly class GatewayTokens
{
    public function __construct(private string $secret) {}

    public static function sign(int $id, int $expiresAt, string $secret): string
    {
        return "{$id}.{$expiresAt}.".hash_hmac('sha256', "{$id}.{$expiresAt}", $secret);
    }

    /** @return int|null the user's id */
    public function validate(string $token): ?int
    {
        [$id, $expiresAt] = explode('.', $token, 3) + ['', ''];

        if (! ctype_digit($id) || ! ctype_digit($expiresAt) || (int) $expiresAt < time()) {
            return null;
        }

        return hash_equals(self::sign((int) $id, (int) $expiresAt, $this->secret), $token) ? (int) $id : null;
    }
}
