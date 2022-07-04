<?php

namespace App\Repositories\Eloquent;

use App\Events\UserSubmitEvent;
use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends EloquentRepository implements UserInterface
{

    public function getModel()
    {
        return User::class;
    }
    public function getAll($request)
    {
        $user = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $user->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($request->phone) && $request->phone) {
            $phone = $request->phone;
            $user->where('phone', 'LIKE', '%' . $phone . '%');
        }
        if (isset($request->address) && $request->address) {
            $address = $request->address;
            $user->where('address', 'LIKE', '%' . $address . '%');
        }
        if (isset($request->user_group_id) && $request->user_group_id) {
            $user_group_id = $request->user_group_id;
            $user->where('user_group_id', 'LIKE', '%' . $user_group_id . '%');
        }


        $user->orderBy('id', 'desc');
        $users = $user->paginate(5);

        return $users;
    }

    public function create($request)
    {

        try {
            $object = $this->model;
            $object->name = $request->name;
            $object->phone = $request->phone;
            $object->password = Hash::make($request->password);
            $object->gender = $request->gender;
            $object->day_of_birth = $request->day_of_birth;
            $object->address = $request->address;
            $object->start_day = $request->start_day;
            $object->email = $request->email;
            $object->user_group_id = $request->user_group_id;

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $storedPath = $avatar->move('avatars', $avatar->getClientOriginalName());
                $object->avatar           = 'upload/' . $avatar->getClientOriginalName();
            }
            $object->save();
            $object->active = 'store';
            event(new UserSubmitEvent($object));
        } catch (\Exception $e) {
            return null;
        }
        return $object;
    }

    public function update($request, $id)
    {
        $object = $this->model->find($id);
        $object->name = $request->name;
        $object->phone = $request->phone;
        if ($request->password) {
        $object->password = Hash::make($request->password);
        }
        $object->gender = $request->gender;
        $object->day_of_birth = $request->day_of_birth;
        $object->address = $request->address;
        $object->start_day = $request->start_day;
        $object->email = $request->email;
        $object->user_group_id = $request->user_group_id;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $storedPath = $avatar->move('avatars', $avatar->getClientOriginalName());
            $object->avatar           = 'upload/' . $avatar->getClientOriginalName();
        }

        $object->save();
        $object->active = 'update';

        event(new UserSubmitEvent($object));
        return $object;
    }

    public function destroy($id)
    {
        $object = $this->model->find($id);

        $object->delete();
        $object->active = 'destroy';
        event(new UserSubmitEvent($object));
        return $object;
    }



    public function trashedItems()
    {

        $query = $this->model->onlyTrashed();

        $query->orderBy('id', 'desc');
        $users = $query->paginate(5);
        return $users;
    }

    public function restore($id)
    {

        $user = $this->model->withTrashed()->find($id);

        if ($user) {
            $user->restore();
            return true;
        } else {
            return false;
        }
        return $user;
    }

    public function force_destroy($id)
    {
        $user = $this->model->withTrashed()->find($id);
        if ($user) {
            $user->forceDelete();
            return $user;
        } else {
            return false;
        }
    }
}
