<?php

namespace App\Claims;

use App\Models\User;
use CorBosman\Passport\AccessToken;

class CustomTokenClaim
{
    public function handle(AccessToken $token, $next)
    {
        //  $token->addClaim('my-claim', 'my custom claim data');
        $user = User::find($token->getUserIdentifier());
        $token->addClaim('user', $user);
        return $next($token);
    }
}
