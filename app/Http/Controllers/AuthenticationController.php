<?php

namespace App\Http\Controllers;
use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use App\Repository\Interface\AuthenticationRepositoryInterface;
use RuntimeException;

class AuthenticationController extends Controller
{
    public $authentication;
    function __construct(AuthenticationRepositoryInterface $authentication)
    {
        $this->authentication = $authentication;
    }

    public function register(Request $request){
        try{
            $this->authentication->register($request->all());
            return redirect()->route('login')->with('success', 'User created successfully!');
        }catch (RuntimeException $e) {
            return redirect()->route('register')->with('error', $e->getMessage());
        }
        
        return back();
    }

    public function login(Request $request){
        try{
            $credentials = $request->only('email', 'password');
            return view('dashboard')->with('success', 'successfully login');
        }catch(RuntimeException $e){
            return back()->with('error', $e->getMessage());
        }
        

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
