<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 24.03.19
 * Time: 20:56
 */

namespace App\Libs\Helpers;


use App\Libs\Responder\Responder;
use App\User;

class Auth
{

    public static function processSuccessfulLogin($payload)
    {
        if (self::isNotInAkaiDomain($payload)) {
            return Responder::response([
                'message' => 'Musisz zalogować się z konta w domenie akai.org.pl'
            ], 403);
        } else {
            $user = User::getUserFromDatabase();
            if($user == null) {
                User::createUserInDatabase();
                $user = User::getUserFromDatbase();
            } else {
                $user->refreshDatabaseData();
            }
            $authToken = $user->generateAuthToken();
            return Responder::response([
                'message' => 'Autoryzacja udana',
                'data' => [
                    'auth_token' => $authToken
                ]
            ]);
        }
    }

    private static function isNotInAkaiDomain($payload)
    {
        return (!isset($payload['hd']) || $payload['hd'] != "akai.org.pl");
    }
}