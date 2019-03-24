<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 13.03.19
 * Time: 18:55
 */

namespace App\Http\Controllers;


use App\Libs\Helpers\Auth;
use App\Libs\Responder\Responder;
use Google_Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    const GOOGLE_CLIENT_ID = "636613961755-qg0m9s04gdnbm8ualkqk3nebgfvn3i7t.apps.googleusercontent.com";

    public function verifyGoogleLogin(Request $request)
    {
        $idToken = $request->input('token_id');
        $client = new Google_Client(['client_id' => self::GOOGLE_CLIENT_ID]);
        $payload = $client->verifyIdToken($idToken);
        if ($payload) {
            return Auth::processSuccessfulLogin($payload);
        } else {
            return Responder::response([
                'message' => 'Autoryzacja nieudana',
            ], 401);
        }
    }
}