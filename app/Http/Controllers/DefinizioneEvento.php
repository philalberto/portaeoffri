<?php

namespace App\Http\Controllers;

use View;
use App\Models\Articoli;

class DefinizioneEvento extends Controller {

    public function mostraArticoli() {

        $articoli = Articoli::all();

        return View::make('main.listaArticoli', compact('articoli'));

    }

    public function salvaArticoli() {

        $articoli = Articoli::all();

        return View::make('main.listaArticoli', compact('articoli'));

    }


}



