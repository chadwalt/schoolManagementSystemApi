<?php
/**
 * This is file will handle all the operations of the user.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Exceptions\NotFoundException;

/**
 * Class UserController - Controlls the operations of the user i.e authentication.
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Authenticate the user to use the app.
     *
     * @param Request $request - request object.
     *
     * @throws NotFoundException
     *
     * @return Response Object.
     */
    public function authenticate(Request $request)
    {
        $this->validate(
            $request, [
                "username" => "required",
                "password" => "required"
            ]
        );
        $user = User::where("username", $request->input("username"))->first();

        if (!$user) {
            throw new NotFoundException("User Not found");
        }

        if (Hash::check($request->input('password'), $user->password)) {
            $userInfo = [
                'name' => $user->first_name . " " . $user->last_name,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'profilePic' => $user->profile_pic,
                'id' => $user->id
            ];
            $apiKey = buildToken($userInfo);

            return response($apiKey, Response::HTTP_OK);
        } else {
            return response("Wrong Username/Password", Response::HTTP_UNAUTHORIZED);
        }
    }
}