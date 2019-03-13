<?php

namespace App\Http\Controllers;

use App\Libs\Helpers\Meeting\MeetingDestroyer;
use App\Libs\Helpers\Meeting\MeetingIndexer;
use App\Libs\Helpers\Meeting\MeetingShower;
use App\Libs\Helpers\Meeting\MeetingStorer;
use App\Libs\Helpers\Meeting\MeetingUpdater;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * @api             {get} /meetings List meetings
     * @apiName         Show meeting list
     * @apiDescription  Shows meeting list.
     * @apiGroup        Meetings
     *
     * @apiExample  {js} Use pseudocode:
     * $http([
     *     method => "GET",
     *     url => "http://{base_url}/meetings"
     * ]);
     *
     * @apiUse Response
     * @apiSuccess {array} data.meetings meeting list
     */
    public function index(Request $request)
    {
        $indexer = new MeetingIndexer($request);
        $indexer->processRequest();
        return $indexer->response;
    }

    public function show(int $id)
    {
        $shower = new MeetingShower($id);
        $shower->processRequest();
        return $shower->response;
    }

    public function store(Request $request)
    {
        $storer = new MeetingStorer($request);
        return $storer->createAndRespond();
    }

    public function update(Request $request, int $id)
    {
        $updater = new MeetingUpdater($request, $id);
        return $updater->upadteAndRespond();
    }

    public function destroy(int $id)
    {
        $destroyer = new MeetingDestroyer($id);
        return $destroyer->deleteAndRespond();
    }

}
