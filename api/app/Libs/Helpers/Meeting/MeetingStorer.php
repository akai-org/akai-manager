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
    protected $id;

    protected function preCreateProcess()
    {
        $this->setValuesFromRequest();
        $this->validateRequestData();
    }

    protected function postCreateProcess()
    {
        $this->getAndSaveAgenda();
    }

    private function validateRequestData()
    {
        $validator = new MeetingStoreValidator($this->valuesToInsert);
        $validator->validateRequest();
    }

    private function getAndSaveAgenda()
    {
        $agenda = $this->request->input('agenda');
        if(isset($agenda) && !empty($agenda)) {
            $parsedAgendaData = array_map(function($item){
                $item['meeting_id'] = $this->id;
                return $item;
            }, $agenda);
            app('db')->table('meeting_agenda')->insert($parsedAgendaData);
        }
    }
}