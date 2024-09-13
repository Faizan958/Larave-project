<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interface\AuthenticationRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(array $data)
    {
        try{
        DB::beginTransaction();
        $user =$this->user::create($data);
        DB::commit();
        return $user;
        }catch(Exception $e){
        DB::rollBack();
        throw new \RuntimeException($e->getMessage());

        }
        
    }

    public function login(array $credentials)
    {
        try{
        $login = Auth::attempt($credentials);
        return $login;
        }catch (Exception $e){
        throw new \RuntimeException($e->getMessage());
        }
    }
    
    public function logout(){
        return Auth::logout();
    }
}

?>
