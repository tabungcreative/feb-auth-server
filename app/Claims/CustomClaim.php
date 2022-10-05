<?php

namespace App\Claims;

use App\Models\User;
use CorBosman\Passport\AccessToken;

class CustomClaim
{
    public function handle(AccessToken $token, $next)
    {
        //  $token->addClaim('my-claim', 'my custom claim data');
        $user = User::find($token->getUserIdentifier());



        $role = [];
        foreach ($user->roles as $value) {
            $role[] = $value->role;
        }

        $userToken = [
            "name" => $user->name,
            'email' => $user->email,
            "roles" => $role
        ];


        $token->addClaim('user', $userToken);

        return $next($token);
    }
}
