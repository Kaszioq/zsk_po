<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DBShowController extends Controller
{
    public function ShowTableUser(Request $request){
        //return DB::table("users")->get();
        //return DB::table("users")->select('name', 'email')->get();
        //return DB::table("users")->insert([
        //    "username"=> $request->username,
        //    "email"=> $request->email,
        //    "password"=> bcrypt($request->password),
        //]);
        return DB::table("users")->insert([
            "name"=> 'Tomasz',
            "email"=> 'tomasz@o1.pl',
            "password"=> Hash::make('tomasz'),
        ]);
    }
}
