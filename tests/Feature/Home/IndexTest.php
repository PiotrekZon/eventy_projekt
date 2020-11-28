<?php
 
namespace Tests\Feature\Home;
 
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
 
class Index extends TestCase
{
    /**
     * @return void
     */
    public function testIndex()
	{
	    $mock = \Mockery::mock('App\Repositories\EventRepository');
	    $this->app->instance('App\Repositories\EventRepository', $mock);
	    
        $mock->shouldReceive('getAll')->once();
	    $response = $this->call('GET', 'home');
	    $response->assertViewHas('event');
	}
}