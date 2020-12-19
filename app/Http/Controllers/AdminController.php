<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

 
class AdminController extends Controller
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
    
    public function index(){
        $users = DB::select('select * from users');
        $events = DB::select('select * from events');
        $rents = DB::select('select * from rents');
        return view('admin',['users'=>$users],['events'=>$events],['rents'=>$rents]);
        
    }
    

}
