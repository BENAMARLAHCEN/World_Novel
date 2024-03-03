<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interface\IUserRepository;

class UserRepository implements IUserRepository
{

    public function list()
    {
        //fetch all the users
        return User::all();
    }

    public function findById($id)
    {
        //fetch single user
        return User::find($id);
    }

    public function findByEmail($email)
    {
        //fetch single user
        return User::where('email', $email)->first();
    }

    public function storeOrUpdate($id = null, $data = [])
    {
        //store or update the user
        if ($id) {
            $user = User::find($id);
            $user->update($data);
            return $user;
        } else {
            return User::create($data);
        }
    }

    public function destroyById($id)
    {
        //delete user
        $user = User::find($id);
        return $user->delete();
    }
}
