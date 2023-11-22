<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFormController extends Controller
{
    public function ShowUser(Request $req){
        //return $req->input(); //{"firstName":"Jacek","lastName":"Prokop"}
        //return $req->input('firstName'); //Jacek
        //return $req->all(); //{"firstName":"Jacek","lastName":"Prokop"}
        //return $req->method(); //GET
        //return $req->url(); //http://127.0.0.1:8000/UserFormController
        //return $req->path(); //UserFormController

        $req->validate([
            'firstName' => 'required | min:3 | max:10',
            'lastName' => 'required | min:3 | max:20',
            'mail' => 'required | min:3 | max:20 | email',
        ],[]);
        //[
            //'firstName.required' => 'Wypełnij pole :attribute',
            //'firstName.min' => 'Wpisz conajmniej :min znaki do pola :attribute',
            //'firstName.max' => 'Możesz wpisać maksymalnie :max znaków do pola :attribute',

            //'lastName.required' => 'Wypełnij pole :attribute',
            //'lastName.min' => 'Wpisz conajmniej :min znaki do pola :attribute',
            //'lastName.max' => 'Możesz wpisać maksymalnie :max znaków do pola :attribute',

            //'mail.required' => 'Wypełnij pole :attribute',
            //'mail.min' => 'Wpisz conajmniej :min znaki do pola :attribute',
            //'mail.max' => 'Możesz wpisać maksymalnie :max znaków do pola :attribute',
            //'mail.email' => 'Pole :attribute musi być typu email',
        //]);

        $data =[
            'firstName' => $req->input('firstName'),
            'lastName' => $req->input('lastName'),
            'mail' => $req->input('mail'),
        ];

        return view('user', $data);
    }
}
