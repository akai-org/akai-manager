<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 21.03.19
 * Time: 20:09
 */

namespace App\Libs\Helpers\Meeting\Validators;


use App\Libs\Validator\Validator;
use Carbon\Carbon;

class MeetingUpdateValidator extends Validator
{
    protected function checkRequest()
    {
        $this->isGiven('place', 'Miejsce wydarzenia musi zostać podane!');
        $this->isGiven('starts_at', 'Czas rozpoczęcia musi zostać podany!');
        $this->isGiven('ends_at', 'Czas zakończenia (trwania) musi zostać podany!');
        $this->hasEndTimePassed();
        $this->isStartTimeLesserThanEndTime();
    }

    private function hasEndTimePassed()
    {
        if(Carbon::make($this->requestData['ends_at']) < Carbon::now()){
            $this->errors['starts_at'] = 'Nie można dodać spotkania, którego termin zakończenia już minął!';
        }
    }

    private function isStartTimeLesserThanEndTime()
    {
        if(Carbon::make($this->requestData['ends_at']) < Carbon::make($this->requestData['starts_at'])){
            $this->errors['ends_at'] = 'Nie można dodać spotkania, którego termin zakończenia jest wcześniejszy niż termin rozpoczęcia!';
        }
    }
}