<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.regis');
    }
    public function postregis(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        $user =User::create([
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        Alert::success('Success', 'Registrasi Berhasil');
        return redirect()->route('login');
    }
}
