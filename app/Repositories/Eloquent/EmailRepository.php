<?php

namespace App\Repositories\Eloquent;

use App\Models\Newsletter;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\EmailInterface;
use Carbon\Carbon;

class EmailRepository extends EloquentRepository implements EmailInterface
{
    public function getModel()
    {
        return Newsletter::class;
    }

    public function getAll($request)
    {
         $email = $this->model->orderBy('id', 'desc')->paginate(10);
         return $email;
    }
    public function create($request)
    {

        $email =$this->model;
        $email->email = $request->email;

        // dd($email);
        $email->save();
        return $email;
    }

    public function update($request,$id)
    {

        $email =$this->model->find($id)->first();
        $email->email = $request->email;
        // dd($email);
        $email->save();
        return $email;
    }
}
