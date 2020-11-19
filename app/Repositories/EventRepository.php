<?php

namespace App\Repositories;

use App\Models\Event;
/**
 *
 * @package App\Repository
 */
class EventRepository extends BaseRepository
{
    
    public function __construct(Event $model) {
        $this->model = $model;
       
    }

        public function getAll($columns = array('*')) {
            return $this->model->with('user')->get($columns);
    }
}