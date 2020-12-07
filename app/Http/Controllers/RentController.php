<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RentRepository;
use App\Http\Requests;
use App\Http\Requests\CreateRentRequest;

class RentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function getAll(RentRepository $rent)
    {
        $rents = $rent->getAll();

        return response()
                ->json($rents);
    }


    public function getAllByEvent(RentRepository $rent, $id)
    {
        $rents = $rent->getAllByEvent($id);

        return response()
                ->json($rents);
    }

    public function accept(RentRepository $rent, $id)
    {
        $rent = $rent->accept($id);

        return response()
                ->json($rent);
    }

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
    /**
     * Show the application rents.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(RentRepository $rent, $id = 1  )
    {
        $dates = $rent->findDatesByEvent($id);

        return view('rents', ['dates' => $dates, 'event_id' => $id]);
    }



     /**
     *@param CreateRentRequest $request
     */
    public function create(RentRepository $rent, CreateRentRequest $request)
    {
        $arrayData = $request->filtered();

        $rent->create($arrayData);

        $request->session()->flash('status', 'Złożono rezerwację!');


        return redirect()->route('rents', ['id' => $request->input('event_id')]);
    }
}
