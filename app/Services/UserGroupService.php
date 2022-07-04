<?php

namespace App\Services;

use App\Repositories\Interfaces\UserGroupInterface;
use App\Services\Interfaces\UserGroupServiceInterface;

class UserGroupService implements UserGroupServiceInterface
{
    protected $userGroupRepository;

    public function __construct(UserGroupInterface $userGroupRepository)
    {
        $this->userGroupRepository = $userGroupRepository;
    }

    public function getAll($request)
    {
        return $this->userGroupRepository->getAll($request);
    }
    public function findById($id)
    {
        return $this->userGroupRepository->findById($id);
    }

    public function create($request)
    {
        $userGroup = $this->userGroupRepository->create($request);
        return $userGroup;

    }

    public function update($request, $id)
    {
        $userGroup = $this->userGroupRepository->findById($id);
        $this->userGroupRepository->update($request, $userGroup);
        return $userGroup;
    }

    public function destroy($id)
    {
        $userGroup = $this->userGroupRepository->findById($id);
        $this->userGroupRepository->destroy($userGroup);
        return $userGroup;

    }

    public function trashedItems(){

        return $this->userGroupRepository->trashedItems();

    }

    public function restore($id){

        return $this->userGroupRepository->restore($id);

    }
    public function force_destroy($id){

        return $this->userGroupRepository->force_destroy($id);

    }

}
