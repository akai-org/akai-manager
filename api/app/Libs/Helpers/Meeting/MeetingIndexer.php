<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 13.03.19
 * Time: 19:27
 */

namespace App\Libs\Helpers\Meeting;


use App\Libs\Indexer\Indexer;
use Illuminate\Http\Request;

class MeetingIndexer extends Indexer
{
    private $request;
    private $query;
    private $results;
    private $tableName;
    private $order;
    private $columns;
    private $pagination;
    public $response;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function processRequest()
    {
        $this->initQuery();
        $this->setColumnsInSelect();
        $this->setPagination();
        $this->setOrder();
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
        if($this->request->input('pagination') != null) {
            $this->pagination = $this->request->input('pagination');
        }
    }

    private function setOrder()
    {
        if ($this->request->input('order') != null) {
            $orderBy = $this->request->input('order')['by'];
            $orderWay = $this->request->input('order')['way'] ?? $this->order['way'];
            if($orderBy){
                $this->query->orderBy($orderBy, $orderWay);
                return ;
            }
        }
        $this->query->orderBy($this->order['by'], $this->order['way']);
    }

    private function executeBeforeObtainingResults()
    {

    }

    private function obtainResults()
    {
        if($this->pagination != null){
            $this->paginateQuery();
        }
        $this->results = $this->query->get();
    }

    private function paginateQuery()
    {
        $pageNum = $this->request->input('page') ?? 1;
        $this->query->offset($this->pagination * ($pageNum - 1))->limit($this->pagination);
    }

    private function executeAfterObtainingResults()
    {

    }

    private function setResponse()
    {

    }
}