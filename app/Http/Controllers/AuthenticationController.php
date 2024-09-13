<?php

namespace App\Http\Controllers;
use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use App\Repository\Interface\AuthenticationRepositoryInterface;

class AuthenticationController extends Controller
{
    public $authentication;
    function __construct(AuthenticationRepositoryInterface $authentication)
    {
        $this->authentication = $authentication;
    }

    public function register(Request $request){
        $this->authentication->register($request->all());
        return back();
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->authentication->login($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(){
        $this->authentication->logout();
        return view("login");
    }
    
}
