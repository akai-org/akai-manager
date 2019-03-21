<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 13.03.19
 * Time: 19:16
 */

namespace App\Libs\Updater;


use Illuminate\Http\Request;

abstract class Updater
{
    protected $request;
    protected $tableName;
    protected $id;
    protected $valuesToInsert = [];
    protected $requestParseData;

    public function __construct(Request $request, int $id)
    {
        $this->request = $request;
        $this->id = $id;
    }

    public function updateObject()
    {
        $this->preUpdateProcess();
        $this->UpdateProcess();
        $this->postUpdateProcess();
    }

    protected function updateProcess()
    {
        $values = [];
        foreach ($this->valuesToInsert as $key => $value) {
            $values[$key] = $value;
        }
        app('db')->table($this->tableName)->where('id', $this->id)->update($values);
    }

    /**
     * Jeżeli klucze wartości w requeście różnią sie od kluczy których oczekuje model (nazw kolumn)
     * to ta funkcja ma za zadanie przetworzenie tych nazw na podstawie informacji podanych w
     * $requestParseData
     *
     * UWAGA! Nadpisuje zawartość valuesToInsert! Powinna być użyta na samym początku w preCreateProcess()!
     */
    protected function parseValuesFromRequest()
    {
        foreach ($this->requestParseData as $dataArray) {
            $this->valuesToInsert[$dataArray['model_name']] = $this->request->input($dataArray['reqeust_name']);
        }
    }

    /**
     * Na podstawie nazw inputów podanych w arrayu $valuesToInsert wybiera z requesta wskazane inputy,
     * po czym zapisuje je z kluczem będących ich nazwą, a pojedyncze nazwy inputów podane na początku
     * zapomina.
     *
     * UWAGA! Funkcja działa tylko w przypadku, kiedy nazwy inputów są tożsame z nazwami kolumn w bazie!
     *
     * Nie musi być wykonywana na początku - działa tylko na numeryczne klucze tablicy wartości
     */
    protected function setValuesFromRequest()
    {
        foreach ($this->valuesToInsert as $key => $inputName) {
            if (is_numeric($key)) {
                $value = $this->request->input($inputName);
                if ($value !== null) {
                    $this->valuesToInsert[$inputName] = $this->request->input($inputName);
                }
                unset($this->valuesToInsert[$key]);
            }
        }
    }

    abstract protected function preUpdateProcess();
    abstract protected function postUpdateProcess();
}