<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    function __construct() {

        $this->middleware('auth:personal');
    }

    public function paginaPrincipal()
    {
        return view('personal.principal');
    }
}
