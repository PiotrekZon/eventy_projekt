<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Api\DefaultController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\RentRepository;
use App\Requests\CreateRentRequest;
 
class RentController extends DefaultController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
 
    //pobiera wszystkie rekordy i zwraca jako JSON
    public function getAll(RentRepository $rent) 
    {
        $rents = $rent->getAll();
 
        return response()
                ->json($rents);
    }
 
 
    //pobranie wszystkich kupionych biletów dla danego Eventu
    public function getAllByEvent(RentRepository $rent, $id)
    {
        $rents = $rent->getAllByEvent($id);
 
        return response()
                ->json($rents);
    }
    
    
    //zatwierdzenie rezerwacji dla podanego id
    public function accept(RentRepository $rent, $id)
    {
        $rent = $rent->accept($id);
 
        return response()
                ->json($rent);
    }
 
    
    //usunięcie rezerwacji
   public function delete(RentRepository $rent, $id)
    {
        
        $status = $rent->delete($id);
 
        if($status)
        {
            return response()
                ->json(['status'=>'success']);
        }
        else{
             return response()
                ->json(['status'=>'fail']);
        }
    }
}