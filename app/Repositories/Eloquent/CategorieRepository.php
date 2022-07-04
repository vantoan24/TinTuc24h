<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CategorieInterface;
use App\Models\Categorie;

class CategorieRepository extends EloquentRepository implements CategorieInterface
{
    public function getModel()
    {
        return Categorie::class;
    }
    public function getAll($request)
    {
        $categories = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $categories->where('name', 'LIKE', '%' . $name . '%');
        }
        return $categories->orderBy('id', 'desc')->paginate(5);
    }
}
