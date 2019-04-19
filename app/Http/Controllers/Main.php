<?php

namespace App\Http\Controllers;

use Input;
use View;
use App\Models\Articolo;
use App\Models\TipoArticolo;
use App\Models\Evento;
use App\Models\EventoArticolo;
use Session;
use \Illuminate\Support\Facades\DB;
use Validator;
use Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

//use

class Main extends Controller {

    public function menu() {

        return View::make('main.getSize');
    }

    public function home() {

        return View::make('pages.home');
    }

    public function contact() {

        return View::make('pages.contact');
    }

    public function getSize($width, $height) {

        Session::put('width', $width);
        Session::put('height', $height);
        return redirect('main');
    }
    public function main() {

        return View::make('layouts.default');
    }

    public function creaEvento() {

        return View::make('pages.creaEvento');
    }

    public function salvaEvento() {

        $input = Input::all();
        $rules = array(
            'descrizione' => 'required',
            'luogo' => 'required',
            'data_evento' => 'required',
            'persona' => 'required'

        );

        $messages = array(
            'data_evento.required' => 'Data non valorizzata',
            'luogo.required' => 'Luogo non valorizzato',
            'persona.required' => 'Nome Responsabile Evento non valorizzato',
            'descrizione.required' => 'Luogo non valorizzato'
        );

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->passes()) {

//            $persona = DB::table('persona')
//                ->select('persona.id')
//                ->where('persona.nickname', $input['nickname'])
//                ->first();
//            if (is_null($persona))
//            {
//                $msg = new MessageBag;
//                $msg->add('nickname', 'Nickname non esistente in archivio. Provvedere alla registrazione');
//                return Redirect::to('creaEvento')->withInput()->withErrors($msg->all());
//            }
//            else
//            {
            $token = str_random(20);

            $evento = new Evento;
            $evento->token = $token;
            $evento->descrizione = $input['descrizione'];
            $evento->luogo = $input['luogo'];
            $evento->note = $input['note'];
            //$evento->id_persona = $persona->id;
            $evento->persona = $input['persona'];
            $evento->data_evento = date('Y-m-d', strtotime($input['data_evento']));
            $evento->save();

            echo $token;
 //           }
        }
        else
        {
            return Redirect::to('creaEvento')->withInput()->withErrors($validator);
        }
    }
    public function getArticoliEvento($token) {
        
        $evento = DB::table('evento')
            ->select('evento.id as id_evento',
                'evento.data_evento',
                'evento.luogo',
                'evento.descrizione',
                'evento.note',
                'evento.token',
                'evento.persona'
                 )
            ->where('evento.token', $token)
            ->first();

        $articoliGiaSelezionati = DB::table('evento_articolo')
            ->select(
                'articolo.id_tipo_articolo',
                'tipo_articolo.descrizione as descrizione_tipo_articolo',
                'evento_articolo.id_articolo',
                'articolo.descrizione as descrizione_articolo',
                'evento_articolo.id_persona',
	        'persona.nome as nome_persona'
               )
             ->selectRaw('sum(evento_articolo.quantita) as quantita')
             ->join('articolo','evento_articolo.id_articolo', '=', 'articolo.id')
             ->join('persona','evento_articolo.id_persona', '=', 'persona.id')
             ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
             ->where('evento_articolo.id_evento', 12)
             ->groupBy('id_articolo','id_persona');
             //->get();
   
          $articoli = DB::table('articolo')
             ->select(
                'articolo.id_tipo_articolo',
                'tipo_articolo.descrizione as descrizione_tipo_articolo',
                'articolo.id as id_articolo',
                'articolo.descrizione as descrizione_articolo',
                'null as id_persona',
	        'null as nome_persona',
                'null as quantita'
               )
             ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
             ->orderBy('id_tipo_articolo', 'asc')
             ->orderBy('id_articolo', 'asc')
             ->orderBy('nome_persona', 'asc')
             ->union($articoliGiaSelezionati)
             ->get();
    
         return View::make('main.listaArticoli', compact('evento','articoli'));


    }
    
    public function getArticoliEventoOLD2($token) {

        $evento = DB::table('evento')
            ->select('evento.id as id_evento',
                'evento.data_evento',
                'evento.luogo',
                'evento.descrizione',
                'evento.note',
                'evento.token',
                'evento.persona'
                //'persona.nome as persona'
                 )
            //->join('persona','evento.id_persona', '=', 'persona.id')
            ->where('evento.token', $token)
            ->first();

        $tipoArticolo = TipoArticolo::orderBy('ordine')->get();

        $articoliGiaSelezionati = DB::table('articolo')
            ->leftJoin('evento_articolo','evento_articolo.id_articolo', '=', 'articolo.id')
            ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
            ->select(
                'articolo.id',
                'articolo.id_tipo_articolo',
                'articolo.descrizione',
                'evento_articolo.quantita',
                'evento_articolo.note',
                'tipo_articolo.id as idTipart',
                'evento_articolo.persona',
                DB::raw('1 as inserito')
            )
            ->where('evento_articolo.id_evento', $evento->id_evento)
            ->orderBy('articolo.id_tipo_articolo', 'asc')
            ->get();

        $articoli = DB::table('articolo')
            ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
            ->select(
                'articolo.id',
                'articolo.id_tipo_articolo',
                'articolo.descrizione',
                DB::raw('null as quantita'),
                DB::raw('null as note'),
                'tipo_articolo.id as idTipart',
                DB::raw('null as persona'),
                DB::raw('0 as inserito')

            )
            ->orderBy('articolo.id_tipo_articolo', 'asc')
            ->get();



        return View::make('main.listaArticoli', compact('tipoArticolo','articoliGiaSelezionati','articolo','evento'));


    }   
    
    

    public function getArticoliEventoOld($token) {

        $evento = DB::table('evento')
            ->select('evento.id as id_evento',
                'evento.data_evento',
                'evento.luogo',
                'evento.descrizione',
                'evento.note',
                'evento.token',
                'evento.persona'
            //'persona.nome as persona'
            )
            //->join('persona','evento.id_persona', '=', 'persona.id')
            ->where('evento.token', $token)
            ->first();

        $tipoArticolo = TipoArticolo::orderBy('ordine')->get();

        $articoliGiaSelezionati = DB::table('articolo')
            ->leftJoin('evento_articolo','evento_articolo.id_articolo', '=', 'articolo.id')
            //->leftJoin('persona','evento_articolo.id_persona', '=', 'persona.id')
            ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
            ->select(
                'articolo.id',
                'articolo.id_tipo_articolo',
                'articolo.descrizione',
                'evento_articolo.quantita',
                'evento_articolo.note',
                'tipo_articolo.id as idTipart',
                'evento_articolo.persona',
                DB::raw('1 as inserito')
            )
            ->where('evento_articolo.id_evento', $evento->id_evento)
            ->get();

        $articolo = DB::table('articolo')
            ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
            ->select(
                'articolo.id',
                'articolo.id_tipo_articolo',
                'articolo.descrizione',
                DB::raw('null as quantita'),
                DB::raw('null as note'),
                'tipo_articolo.id as idTipart',
                DB::raw('null as persona'),
                DB::raw('0 as inserito')

            )
            ->orderBy('articolo.id_tipo_articolo', 'asc')
            ->get();


        $articolo = DB::table('articolo')
            ->join('tipo_articolo','articolo.id_tipo_articolo', '=', 'tipo_articolo.id')
            ->select(
                'articolo.id',
                'articolo.id_tipo_articolo',
                'articolo.descrizione',
                DB::raw('null as quantita'),
                DB::raw('null as note'),
                'tipo_articolo.id as idTipart',
                DB::raw('null as persona'),
                DB::raw('0 as inserito')

            )
            ->orderBy('articolo.id_tipo_articolo', 'asc')
            ->orderBy('inserito','desc')
            ->union($articoliGiaSelezionati)
            ->get();

        return View::make('main.listaArticoli', compact('tipoArticolo','articolo','evento'));


    }

    /**
     *
     */
    public function salvaArticoli() {
        $input = Input::all();

        $token = $input['token'];
        //$nickname = $input['nickname'];
        $persona = $input['persona'];
        $id_evento = $input['id_evento'];

//        $persona = DB::table('persona')
//            ->select('persona.id')
//            ->where('persona.nickname', $nickname)
//            ->first();

        $id = $input['id'];
        $quantita = $input['quantita'];
        $ind = -1;

        foreach ($id as $id1) {
             ++$ind;
                //echo "In lista " . $id[$ind] . ' | ' . $inserito[$ind] . ' | ' . $quantita[$ind] . "<br/>";
                if (isset($quantita[$ind])) {
                    $eventoArticolo = new EventoArticolo;
                    $eventoArticolo->id_articolo = $id[$ind];
                    //$eventoArticolo->id_persona = $persona->id;
                    $eventoArticolo->persona = $persona;
                    $eventoArticolo->id_evento = $id_evento;
                    $eventoArticolo->quantita = $quantita[$ind];
                    $eventoArticolo->save();
            }
         }
         return Redirect::action('Main@getArticoliEvento', $token);
    }


    public function mostraArticoli() {

        $tipoArticolo = TipoArticolo::orderBy('ordine')->get();
        $articolo = Articolo::all();
        return View::make('main.listaArticoli', compact('articolo'), compact('tipoArticolo'));
    }



    //public function postajax(Request $request){
    //    echo 'aaaaa';
    //    $response = array(
    //        'status' => 'success',
    //        'msg' => $request->message,
    //    );
    //    return response()->json($response);
    //}

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost()
    {
        $nickname = Input::get('name');
        $persona = DB::table('persona')
            ->select('persona.nome')
            ->where('persona.nickname', $nickname)
            ->first();

        return response()->json(['success'=>$persona->nome]);
    }

    public function ajaxRequestPost2()

    {
        $input = request()->all();
        echo $input;

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function test()

    {

        return view('test');

    }




}
