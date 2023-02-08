<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $jumlahpage = 5;
    public function index(Request $request)
    {
        $users = $request->get('keyword') ? User::search($request->keyword)->paginate($this->jumlahpage)
            : User::paginate($this->jumlahpage);
        return view('user.index', [
            'users' => $users->appends(['keyword' => $request->keyword])
        ]);
    }
}
