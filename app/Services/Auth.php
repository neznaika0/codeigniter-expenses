<?php

declare(strict_types=1);

namespace App\Services;

use Config\App;

class Auth
{
    public const SESSION_KEY = 'logged_in';

    /**
     * A file containing the hash of the last authorized user
     */
    private string $tempAuthFile = WRITEPATH . 'cache/logged';

    public function __construct()
    {
        helper(['text']);
    }

    public static function isLogged(): bool
    {
        return (bool) session(self::SESSION_KEY);
    }

    public function login(string $password): bool
    {
        $secretKey = config(App::class)->secretKey;

        if (password_verify($password, $secretKey) === false) {
            return false;
        }

        // We save it so that only one user can log in
        $authHash = random_string('crypto', 16);

        file_put_contents($this->tempAuthFile, $authHash);
        session()->set(self::SESSION_KEY, $authHash);

        return true;
    }

    public function logout(): void
    {
        if (is_file($this->tempAuthFile)) {
            unlink($this->tempAuthFile);
        }

        session()->set(self::SESSION_KEY);
        session()->destroy();
    }
}
