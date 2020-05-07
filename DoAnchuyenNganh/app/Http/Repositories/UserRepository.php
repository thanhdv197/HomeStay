<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\User;
use Hash;

class UserRepository
{
    protected $user;

    public function __construct(){
        $this->user = new User();
    }
    
    //Get list users
    public function getListUser()
    {
        return $this->user->all();
    }

    //Insert new user
    public function insert($username, $password, $email, $name, $phonenumber, $address, $birthday, $avatar) 
    {
        $this->user->username = $username;
        $this->user->password = Hash::make($password);
        $this->user->email = $email;
        $this->user->name = $name;
        $this->user->phonenumber = $phonenumber;
        $this->user->address = $address;
        $this->user->birthday = $birthday;
        $this->user->avatar = $avatar;
        $this->user->level = 'user';

        $this->user->save();
    }

    // Update profile user
    public function updateInfo($name, $phonenumber, $address, $birthday, $avatar, $id)
    {
        $update = $this->user->find($id);
        $update->name = $name;
        $update->phonenumber = $phonenumber;
        $update->address = $address;
        $update->birthday = $birthday;
        $update->avatar = $avatar;

        $update->save();
    }

    // Update password user
    public function updatePassword($id, $password)
    {
        $update = $this->user->find($id);
        $update->password = Hash::make($password);

        $update->save();
    }
}
