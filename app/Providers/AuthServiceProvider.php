<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You"re free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app["auth"]->viaRequest("api", function ($request) {
            $token = substr($request->header("Authorization"), 7);
            $parsedToken = (new Parser())->parse((string) $token);

            if ($request->input("api_token") || $token) {
                $user = factory(\App\Models\User::class)->make(
                    [
                        "uid" => $parsedToken->getClaim("id")->id,
                        "name" => $parsed_token->getClaim("first_name") . " " . $parsed_token->getClaim("last_name"),
                        "username" =>$parsed_token-getClaim("username"),
                        "email" => $parsed_token->getClaim("email"),
                        "role" => $parsed_token->getClaim("role"),
                        "profilePic" => $parsed_token->getClaim("profile_pic"),
                    ]
                );
                return $user;
            }
        });
    }
}
