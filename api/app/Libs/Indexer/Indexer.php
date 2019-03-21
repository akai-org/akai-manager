<?php

namespace App\Libs\Indexer;


use Illuminate\Http\Request;

abstract class Indexer
{
    public $response;
    protected $request;
    protected $query;
    protected $tableName;
    protected $order;
    protected $columns;
    protected $pagination;
    protected $successMessage;
    protected $dataArrayName;
    private $results;
    private $resultsCount;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function processRequest()
    {
        $this->initQuery();
        $this->setColumnsInSelect();
        $this->setPagination();
        $this->setRequestOrder();
        $this->executeBeforeObtainingResults();
        $this->obtainResults();
        $this->executeAfterObtainingResults();
        $this->setResponse();
    }

    private function initQuery()
    {
        $this->query = app('db')->table($this->tableName);
    }

    private function setColumnsInSelect()
    {
        foreach ($this->columns as $column) {
            $this->query->addSelect($this->tableName . '.' . $column);
        }
    }

    private function setPagination()
    {
        if ($this->request->input('pagination') != null) {
            $this->pagination = $this->request->input('pagination');
        }
    }

    private function setRequestOrder()
    {
        if ($this->request->input('order') != null) {
            $this->orderBy['by'] = $this->request->input('order')['by'];
            $this->orderBy['way'] = $this->request->input('order')['way'];
        }
        $this->query->orderBy($this->tableName . "." . $this->order['by'], $this->order['way']);
    }

    private function executeBeforeObtainingResults()
    {

    }

    private function obtainResults()
    {
        if ($this->pagination != null) {
            $this->setResultsCount();
            $this->paginateQuery();
        }
        $this->results = $this->query->get();
    }

    private function paginateQuery()
    {
        $pageNum = $this->request->input('page') ?? 1;
        $this->query->offset($this->pagination * ($pageNum - 1))->limit($this->pagination);
    }

    private function setResultsCount()
    {
        $this->resultsCount = $this->query->get()->count();
    }

    private function executeAfterObtainingResults()
    {

    }

    private function setResponse()
    {
        $responseContent = [
            'message' => $this->successMessage,
            'data' => [
                $this->dataArrayName => $this->results
            ]
        ];
        if ($this->pagination != null) {
            $responseContent['pagination'] = $this->getPaginationInfo();
        }
        $this->response = response($responseContent);
    }

    private function getPaginationInfo()
    {
        $currentPage = $this->request->input('page') ?? 1;
        $lastPage = $this->getPaginationPagesNumber();
        $previousPage = ($currentPage - 1 > 0) ? $currentPage - 1 : 'null';
        $nextPage = ($currentPage + 1 > $lastPage) ? 'null' : $currentPage + 1;
        return (object)[
            'current_page_number' => $currentPage,
            'first_page' => 1,
            'last_page' => $lastPage,
            'previous_page' => $previousPage,
            'next_page' => $nextPage
        ];
    }

    private function getPaginationPagesNumber()
    {
        if ($this->pagination != null) {
            $paginationTotalPagesNumber = (int)ceil($this->resultsCount / $this->pagination);
            return $paginationTotalPagesNumber;
        }
    }
}