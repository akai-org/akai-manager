<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 21.03.19
 * Time: 18:57
 */

namespace App\Libs\Responder;


class Responder
{
    public static function response(array $data, int $code = 200)
    {
        $jsonContent = json_encode($data);
        return response($jsonContent, $code, [
            'Content-Type' => 'application/json'
        ]);
    }
}