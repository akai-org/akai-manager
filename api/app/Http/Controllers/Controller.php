<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @apiDefine Authorization
 * @apiHeader {string} Authorization    Auth token
 */

/**
 * @apiDefine Response
 * @apiSuccess {string} message   Success message
 * @apiSuccess {object} data      Object with data
 *
 * @apiError {string} message       Error message
 * @apiError {object} [errors]      Object with errors
 * @apiError {string} [exception]   Exception name
 * @apiError {string} [file]        Error's file
 * @apiError {int}    [line]        Error's line number
 * @apiError {array}  [trace]       Array with trace
 */

/**
 * @apiDefine ResponseErrors
 *
 * @apiError {string} message       Error message
 * @apiError {object} [errors]      Object with errors
 * @apiError {string} [exception]   Exception name - Laravel debug mode only
 * @apiError {string} [file]        Error's file - Laravel debug mode only
 * @apiError {int}    [line]        Error's line number - Laravel debug mode only
 * @apiError {array}  [trace]       Array with trace - Laravel debug mode only
 */
class Controller extends BaseController
{
    //
}
