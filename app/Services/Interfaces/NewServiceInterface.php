<?php

namespace App\Services\Interfaces;

interface NewServiceInterface extends Service
{
    public function getHot($request);
    public function newPresentli();
    public function getAllByCategory($id);
    public function force_destroy($id);
    public function restore($id);
    public function trashedItems();
}
