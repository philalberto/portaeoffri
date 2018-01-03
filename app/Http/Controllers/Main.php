<?php

namespace App\Http\Controllers;

use View;
use App\Models\Articoli;

class Main extends Controller {

    public function mostraArticoli() {

        $articoli = Articoli::all();

        return View::make('main.listaArticoli', compact('articoli'));

    }

}
