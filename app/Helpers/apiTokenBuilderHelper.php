<?php

use Lcobucci\JWT\Builder;

/**
 * Build token for authenication.
 *
 * @param array $userInfo - The information of the user.
 *
 * @return JWT $token - The token built.
 */
function buildToken($userInfo)
{
    extract($userInfo);
    $token = (new Builder())->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
        ->setExpiration(time() + 3600) // Configures the expiration time of the token (exp claim)
        ->set('uid', $id) // Configures a new claim, called "uid"
        ->set('name', $name) // Configures a new claim, called "name of the user"
        ->set('username', $username) // Configures a new claim, called "username"
        ->set('email', $email) // Configures a new claim, called "email"
        ->set('profile_pic', $profilePic) // Configures a new claim, called "profile_pic"
        ->set('role', $role) // Configures a new claim, called "role"
        ->getToken(); // Retrieves the generated token

    return $token;
}
