<?php

namespace App\Http\Controllers;


use Input;
use View;
use App\Models\Articolo;
use App\Models\Evento;
use Session;


class Autenticazione extends Controller
{
    public function showLogin()
    {
        // show the form
        return View::make('auth.login');
    }

    public function doLogin()
    {
// process the form
    }
}
