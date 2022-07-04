<?php 
namespace App\Repositories\Interfaces;

interface NewInterface extends RepositoryInterface {
    public function getHot($request);   
    public function newPresentli();
    public function getAllByCategory($id);
    public function force_destroy($id);
    public function restore($id);
    public function trashedItems();
}