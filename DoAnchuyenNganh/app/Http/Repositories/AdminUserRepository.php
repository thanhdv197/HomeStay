<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\User;


class AdminUserRepository
{
    protected $user;


    public function __construct(){
        $this->user = new User();
    }

    public function getUser()
    {
        return $this->user->where('flag_delete', 0)->get();
    }

    public function addUser(array $input_user)
    {
        $this->user->create($input_user);
    }

    public function delete($id)
    {
        $user = $this->user->where('id', $id)->first();

        $user->flag_delete = 1;
        $user->save();
    }

    public function getUserById($id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function editUser(array $input_user, $id)
    {
        $user = $this->user->where('id', $id)->first();
        $user->update($input_user);
    }

}
