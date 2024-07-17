<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $foods = Makanan::with('kategoriMakanan')->paginate(15);
        return view("dashboard", [
            "title" => "Dashboard",
            "foods" => $foods,
        ]);
    }
    
    public function register()
    {
        return view("sign-up");
    }

    public function registore(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required','unique:users'],
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $validatedData['password']=bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success','Regristration Successfully');
    }
    
    public function login()
    {
        return view("sign-in");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->with([
            'Error' => 'Username or Password doesn\'t Exist',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
