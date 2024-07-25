<?php
namespace App\Services;

use App\Models\User;
use App\Models\Admin;

class UserService
{
    public function getAdmins()
    {
        return Admin::pluck('name', 'id');
    }

    public function getNonAdminUsers()
    {
        return User::pluck('name', 'id');
    }

}