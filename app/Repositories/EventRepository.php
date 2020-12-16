<?php

namespace App\Repositories;

use App\Models\Event;
/**
 *
 * @package App\Repository
 */
class EventRepository extends BaseRepository
{
    
    public function __construct(Event $event) {
        $this->event = $event;
       
    }
    

        public function getAll($columns = array('*')) {
            return $this->event->with('user')->get($columns);
    }

    public function getAllByUser($idUser) {
        return $this->event->with('user')->where('user_id','=',$idUser)->get();
    }
    

}