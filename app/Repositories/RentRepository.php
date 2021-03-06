<?php

namespace App\Repositories;

use App\Models\Rent;
use Carbon\Carbon;
/**
 * Class BanRepo.
 *
 * @package App\Repository
 */
class RentRepository extends BaseRepository
{
    
    public function __construct(Rent $model) {
        $this->model = $model;
       
    }

    public function findDatesByEvent($idEvent) {
        $rents =  $this->model->with('event')->where('event_id','=',$idEvent)->get();

        $seasonStart = Carbon::createFromDate(2017, 4, 1, 'Europe/Warsaw');

        $seasonEnd = Carbon::createFromDate(2017, 11, 1, 'Europe/Warsaw');

        /**
        *    Iterujemy po miejscach
        */
        for($date = $seasonStart; $date->lte($seasonEnd); $date->addDay()) {

            $dates[$date->format('Y-m-d')] = $date->format('Y-m-d');

            foreach($rents as $rent){
                if($rent->status == 2)
                {
                    $rentStartDate = Carbon::createFromFormat("Y-m-d H:i:s",$rent->start);

                    $rentEndDate = Carbon::createFromFormat("Y-m-d H:i:s",$rent->end);

                    if($rentStartDate->lte($date) && $rentEndDate->gte($date))
                    {
                            $dates[$date->format('Y-m-d')] = array($date->format('Y-m-d'),$rent->toArray());

                    }
                }

            }
        }
        return range(1,100);
    }

    public function getAllByEvent($idEvent) {
        return $this->model->with('event')->where('event_id','=',$idEvent)->get(); //dla konkretnego ID eventu pobieramy wszystkie rekordy z tabeli rezerwacji
    }
    public function accept($idRent) {
 
        $rent = $this->model->find($idRent);//odnajduje potrzebną rezerwację,
        $rent->status = 2; //zmiena statusu rezerwacji
        $rent->save(); //zapisanie w bazie
        
        return $rent;
    }
}