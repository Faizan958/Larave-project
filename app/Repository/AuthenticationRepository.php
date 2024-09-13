<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interface\AuthenticationRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Authentication implements AuthenticationRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(array $data)
    {
        return $this->user::create($data);
    }

    public function login(array $credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logout(){
        return Auth::logout();
    }
}

?>
