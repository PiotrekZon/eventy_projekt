<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Api\DefaultController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\UserRepository;
use App\Requests\CreateUserRequest;
 
class UserController extends DefaultController
{
 
    public function __construct()
    {   
    }
 
    public function store(UserRepository $user, CreateUserRequest $request)
    {
        $success = $user->create($request->all());
 
        return response()
                ->json($success);
    }
 
    public function getAll(UserRepository $user)
    {
        $users = $user->getAll();
 
        return response()
                ->json($users);
    }
 
    public function find(UserRepository $user, $id)
    {
        $users = $user->find($id);
 
        return response()
                ->json($users);
    }
}