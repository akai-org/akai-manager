<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 13.03.19
 * Time: 19:24
 */

namespace App\Libs\Helpers\Meeting;


use App\Libs\Helpers\Meeting\Validators\MeetingUpdateValidator;
use App\Libs\Updater\Updater;

class MeetingUpdater extends Updater
{

    protected $tableName = "meetings";
    protected $valuesToInsert = [
        'place', 'starts_at', 'ends_at'
    ];

    protected function preUpdateProcess()
    {
        $this->setValuesFromRequest();
        $this->validateRequestData();
    }

    protected function postUpdateProcess()
    {
    }

    private function validateRequestData()
    {
        $validator = new MeetingUpdateValidator($this->valuesToInsert);
        $validator->validateRequest();
    }
}