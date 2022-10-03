<?php

namespace App\Claims;

use App\Models\User;
use CorBosman\Passport\AccessToken;

class CustomClaim
{
    public function handle(AccessToken $token, $next)
    {
        //  $token->addClaim('my-claim', 'my custom claim data');
        $user = User::select('name', 'email')->find($token->getUserIdentifier());

        $roles = [];
        foreach ($user->roles as $value) {
            $roles[] = $value->role;
        }
        $token->addClaim('user', $user);
        $token->addClaim('roles', $roles);
    }
}
