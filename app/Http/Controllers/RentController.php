<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RentRepository;
use App\Http\Requests;
use DB;
use App\Http\Requests\CreateRentRequest;
use App\Models\Rent;

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
    
    
    //Obsługa formularza kupna biletu
    function save(Request $req)
    {
        //print_r($req->input());
        $event_id = $req -> input('event_id');
        $price = $req -> input('price');
        $payment_status = $req -> input('payment_status');
        $status = $req -> input('status');
        $place_num = $req -> input('place_num');
        $user_id = $req -> input('user_id');
        $user_name = $req -> input('user_name');
        $event = $req -> input('event');
        

        
        $data = array ('event_id' => $event_id, 'price' => $price,'payment_status' => $payment_status, 'status' => $status, 'place_num' => $place_num, 'user_id' => $user_id, 'user_name' => $user_name, 'event' => $event);
        DB::table('rents')->insert($data);
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
        $events = DB::select('select * from events');
        $rents = DB::select('select * from rents');

        return view('rents', ['events'=>$events, 'rents'=>$rents, 'event_id' => $id]);
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
