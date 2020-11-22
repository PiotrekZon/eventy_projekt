<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\RentRepository;
use App\Requests\CreateRentRequest;

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
     * Create rent.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RentRepository $rent, CreateRentRequest $request)
    {
        $arrayData = $request->filtered();

        $rent->create($arrayData);

        $request->session()->flash('status', 'Złożono rezerwację!');


        return redirect()->route('rents', ['id' => $request->input('event_id')]);
    }
}