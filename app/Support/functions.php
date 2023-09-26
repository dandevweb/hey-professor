<?php

declare(strict_types=1);

if (!function_exists('user')) {

    function user(): ?\App\Models\User
    {
        return auth()->user() ?? null;
    }
}
