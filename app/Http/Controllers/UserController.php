<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Repositories\EventRepository;
 
class UserController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function user(EventRepository $event)
     {
          $events = $event->getAll();
 
        return view('user', ['events' => $events]);
        
     }
    

}
