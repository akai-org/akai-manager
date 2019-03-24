<?php

namespace App\Libs\Helpers\Meeting;


use App\Libs\Shower\Shower;

class MeetingShower extends Shower
{
    protected $tableName = "meetings";
    protected $columns = ["*"];
    protected $successMessage = "Pomyślnie pobrano szczegóły spotkania";
    protected $dataArrayName = "meeting";

    protected function executeBeforeObtainingResults()
    {

    }

    protected function executeAfterObtainingResults()
    {
        $this->appendAgenda();
    }

    private function appendAgenda()
    {
        $agenda = app('db')->table('meeting_agenda')->where('meeting_id', $this->id)->get(['order', 'title', 'content']);
        $this->results->agenda = $agenda;
    }
}