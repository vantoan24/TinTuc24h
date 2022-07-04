<?php

namespace App\Services;

use App\Services\Interfaces\AuthServiceInterface;
use App\Repositories\Interfaces\AuthInterface;

class AuthService implements AuthServiceInterface
{
    protected $authRepository;

    public function __construct(AuthInterface $authRepository){
        $this->authRepository = $authRepository;
    }
    public function getAll($request)
    {
    }
    public function findById($id)
    {
    }
    public function create($request)
    {
    }
    public function update($request, $id)
    {
    }
    public function destroy($id)
    {
    }

    public function postLogin($request){
       return $this->authRepository->postLogin($request);

    }

}
