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
 
    public function create(array $data) {
    	$image_array = $data['image']; 
 
    	unset($data['image']);
    	
    	$event = $this->event->create($data);
 
    	$img = str_replace('data:image/png;base64,', '', $image_array);
 
		$img = str_replace(' ', '+', $image_array);
 
		$data = base64_decode($image_array);
 
		file_put_contents(public_path().'/img/events/' . $event->id.".jpg", $data);
 
		$event->image = $event->id.".jpg";
 
		$event->save();
 
        return $event;
    }
 
    public function update(array $data,$id) {
    	
    	$event = $this->event->find($id);
    	if(isset($data['image']))
    	{
    		$image_array = $data['image']; 
 
    		unset($data['image']);
    	}
    	
    	$event->update($data);
 
    	if(isset($image_array))
    	{
	    	$img = str_replace('data:image/png;base64,', '', $image_array);
 
			$img = str_replace(' ', '+', $image_array);
 
			$data = base64_decode($image_array);
 
			file_put_contents(public_path().'/img/events/' . $event->id.".jpg", $data);
 
			$event->image = $event->id.".jpg";
 
			$event->save();
		}	
        return $event;
    }

}