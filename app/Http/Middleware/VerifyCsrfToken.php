<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'return-url', 
        'upgrade-return-url',
        'video-watch', 
        'notify_url', 
        'send-welcome-mail',
        'return-url-instamozo',
        'return-url-phonePay', 
        'callback-url-phonePay',
        'upgrade-phonepay',
        'callback-upgrade-phonepay'
    ];
}
