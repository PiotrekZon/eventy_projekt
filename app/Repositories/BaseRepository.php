<?php 
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 */
abstract class BaseRepository implements RepositoryInterface {
    /**
     * @var
     */
    protected $event;

    public function getAll($columns = array('*')) {
        return $this->event->get($columns);
    }

    public function create(array $data) {
        return $this->event->create($data);
    }

    public function update(array $data, $id) {
        return $this->event->where("id", '=', $id)->update($data);
    }

    public function delete($id) {
        return $this->event->destroy($id);
    }

     public function find($id, $columns = array('*')) {
        return $this->event->find($id, $columns);
    }

}