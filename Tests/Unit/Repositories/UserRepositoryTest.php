<?php
 
namespace Tests\Unit\Repositories;
 
use Tests\TestCase;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
 
class UserRepositoryTest extends TestCase
{
    use DatabaseTransactions;
 
     public function testGetAll() {
        $data = $this->getAllData();
 
        $ordersAdded = array();
        $ordersAdded[] = factory(User::class)->create($data[0]);
        $ordersAdded[] = factory(User::class)->create($data[1]);
        $ordersAdded[] = factory(User::class)->create($data[2]);
 
        unset($data[0]['password']);
        unset($data[1]['password']);
        unset($data[2]['password']);
 
		 $all = $this->getGetAllFilteredResponse();
 
         $this->assertContains($data[0], $all);
         $this->assertContains($data[1], $all);
         $this->assertContains($data[2], $all);
    }
    private function getGetAllFilteredResponse(){
 
		$userRepository = \App::make(UserRepository::class);
 
		$all = app()->make(UserRepository::class)->getAll()->toArray();
		foreach($all as &$single){
			unset($single['created_at']);
			unset($single['updated_at']);
			unset($single['id']);
			unset($single['api_token']);
		}
    	return $all;
    }
 
	public function testFind() {
 
        $data = $this->getAllData();
 
        $added = factory(User::class)->create($data[0]);
 
        unset($data[0]['password']);
 
         $added = $this->getFindFilteredResponse($added->id);
 
         $this->assertEquals($data[0], $added);
    }
 
 
    private function getFindFilteredResponse($userId){
 
		$userRepository = \App::make(UserRepository::class);
 
		$single = app()->make(UserRepository::class)->find($userId)->toArray();
		
		unset($single['created_at']);
		unset($single['updated_at']);
		unset($single['id']);
		unset($single['api_token']);
		
    	return $single;
    }
 
    
    private function getAllData(){
 
    	return [
            [
                "name" => "User 1",
                "email" => "user1@user.com",
                "password" => "password1"
            ],
            [
                "name" => "User 2",
                "email" => "user2@user.com",
                "password" => "password2"
            ],
            [
                "name" => "User 3",
                "email" => "user3@user.com",
                "password" => "password3"
            ]
        ];
    }
}