<?php
namespace App\Libs\Shower;


abstract class Shower
{
    public $response;
    protected $table;
    protected $query;
    protected $tableName;
    protected $columns;
    protected $successMessage;
    protected $dataArrayName;
    protected $results;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function createResponse()
    {
        $this->initQuery();
        $this->setColumnsInSelect();
        $this->executeBeforeObtainingResults();
        $this->obtainResults();
        $this->executeAfterObtainingResults();
        $this->setResponse();
    }

    protected function initQuery()
    {
        $this->query = app('db')->table($this->tableName)->where("id", $this->id);
    }

    private function setColumnsInSelect()
    {
        foreach ($this->columns as $column) {
            $this->query->addSelect($this->tableName . '.' . $column);
        }
    }

    protected function executeBeforeObtainingResults()
    {

    }

    protected function executeAfterObtainingResults()
    {

    }

    private function obtainResults()
    {
        $this->results = $this->query->get()->first();
    }

    private function setResponse()
    {
        $responseContent = [
            'message' => $this->successMessage,
            'data' => [
                $this->dataArrayName => $this->results
            ]
        ];
        $this->response = response($responseContent);
    }
}