<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 13.03.19
 * Time: 18:54
 */

namespace App\Http\Controllers;


class MemberController extends Controller
{
    /**
     * @api             {get} /members List members
     * @apiName         Show member list
     * @apiDescription  Shows member list.
     * @apiGroup        Members
     *
     * @apiExample  {js} Use pseudocode:
     * $http([
     *     method => "GET",
     *     url => "http://{base_url}/members"
     * ]);
     *
     * @apiUse Response
     * @apiSuccess {array} data.places place list
     */
    public function index()
    {
        
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}