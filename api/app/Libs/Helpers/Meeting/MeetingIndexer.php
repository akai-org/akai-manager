<?php

namespace App\Libs\Helpers\Meeting;


use App\Libs\Indexer\Indexer;

class MeetingIndexer extends Indexer
{
    protected $tableName = "meetings";
    protected $order = ["by" => "id", "way" => "asc"];
    protected $columns = ["place", "starts_at", "ends_at"];
    protected $successMessage = "Pomyślnie pobrano wszystkie spotkania";
    protected $dataArrayName = "meetings";
}