<?php

namespace App\Libs\Helpers\Meeting;


use App\Libs\Indexer\Indexer;
use Carbon\Carbon;

class MeetingIndexer extends Indexer
{
    protected $tableName = "meetings";
    protected $order = ["by" => "id", "way" => "desc"];
    protected $columns = ["id", "place", "starts_at", "ends_at"];
    protected $successMessage = "Pomyślnie pobrano wszystkie spotkania";
    protected $dataArrayName = "meetings";

    protected function executeAfterObtainingResults()
    {
        $this->results = $this->results->map(function($item) {
            $item->status = $this->getMeetingStatus($item);
            return $item;
        });
    }

    private function getMeetingStatus($item)
    {
        if($item->ends_at < Carbon::now()){
            return "Zakończone";
        } else if($item->ends_at > Carbon::now() && $item->starts_at < Carbon::now()) {
            return "Trwa";
        } else {
            return "Nadchodzi";
        }
    }
}