<?php

namespace App\Libs\Helpers\Meeting;


use App\Libs\Helpers\Meeting\Validators\MeetingStoreValidator;
use App\Libs\Storer\Storer;

class MeetingStorer extends Storer
{
    protected $tableName = "meetings";
    protected $valuesToInsert = [
        'place', 'starts_at', 'ends_at'
    ];

    protected function preCreateProcess()
    {
        $this->setValuesFromRequest();
        $this->validateRequestData();
    }

    protected function postCreateProcess()
    {

    }

    private function validateRequestData()
    {
        $validator = new MeetingStoreValidator($this->valuesToInsert);
        $validator->validateRequest();
    }
}