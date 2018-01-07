<?php

namespace App\Http\Controllers;

use Input;
use View;
use App\Models\Articoli;

class DefinizioneEvento extends Controller {

    public function mostraArticoli() {

        $articoli = Articoli::all();

        return View::make('main.listaArticoli', compact('articoli'));

    }

    public function salvaArticoli() {

        $input = Input::all();
        $id = $input['id'];
        $articoloSelezionato = $input['articoloSelezionato'];
        $quantitaSelezionata = $input['quantitaSelezionata'];
        foreach ($id as $key => $n) {

            if (!empty($articoloSelezionato[$key]))
            {
                echo $n . ' '.$articoloSelezionato[$key] . ' '.$quantitaSelezionata[$key].' <br>';
            }
        }
        foreach ($id as $mioid) {

                 echo $mioid.' <br>';
         }



    }


}



