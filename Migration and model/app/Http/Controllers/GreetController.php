<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function greetMethod() {
        $data = [
            'name' => 'Mark'
        ];
        return view('greet', $data);
    }
}