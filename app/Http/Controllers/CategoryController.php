<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Repositories\EventRepository;
 
class CategoryController extends Controller
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
    public function teatr(EventRepository $event)
    {
          $events = $event->getAll();
 
        return view('teatr', ['events' => $events]);
        
    }
    public function kino(EventRepository $event)
    {
          $events = $event->getAll();
 
        return view('kino', ['events' => $events]);
    }
    public function koncert(EventRepository $event)
    {
          $events = $event->getAll();
 
        return view('koncert', ['events' => $events]);
    }
    public function archiwum(EventRepository $event)
    {
          $events = $event->getAll();
 
        return view('archiwum', ['events' => $events]);
    }
}
