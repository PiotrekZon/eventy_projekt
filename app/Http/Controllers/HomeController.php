<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Repositories\EventRepository;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
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
    public function index(EventRepository $event)
    {
          $events = $event->getAll();
 
        return view('home', ['events' => $events]);
    }
    public function admin()
{
  if (Gate::allows('admin-only', Auth::user())) 
    return view('admin');
  else
    return 'You are not a Administrator !!!';
} 
}
