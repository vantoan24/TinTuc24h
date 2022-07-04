<?php
namespace App\Services\Interfaces;

interface Service
{
    public function getAll($request);
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);

}