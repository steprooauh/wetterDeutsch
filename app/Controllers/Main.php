<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland; //importujeme model bundesland
use App\Models\Station;
use App\Models\Data;

class Main extends BaseController
{
    public function index()
    {
        $bundesland = new Bundesland(); //vytvoříme novou instanci třídy Bundesland
        $zeme = $bundesland->findAll(); //do zeme vypíšeme všechny data pomocí findAll()
        //var_dump($zeme);
        $data = [
            "zeme" => $zeme
        ]; //numericke pole = klíče jsou jenom čísla
        echo view('zeme', $data);
    }

    public function stanice($id)
    {
        $bundesland = new Bundesland();
        $zeme = $bundesland->find($id);

        $station = new Station();
        $stanice = $station->where('bundesland', $id)->findAll();
        $zemeName =  $zeme->name;
        $file = 'Map_' . $zemeName . '_in_Germany.png';
        $vlajka = 'Flag_of_' . $zemeName . '.png';

        $mapaURL = base_url('img/mapy/' . $file);
        $vlajkaURL = base_url('img/vlajky/' . $vlajka);

        $data = [
            "zeme" => $zeme,
            "stanice" => $stanice,
            "mapa_soubor" => $mapaURL,
            "vlajka_soubor" => $vlajkaURL
        ];

        echo view('stanice', $data);
    }


    public function data($idStanice)
    {
        $station = new Station();
        $stanice = $station->find($idStanice);
        $data = new Data();
        $dataStanic = $data->where('Stations_ID', $idStanice)->orderBy('date','desc')->paginate(25);
        $pager = $data->pager;
        $dataObalka = [
            "stanice" => $stanice,
            "dataStanic" => $dataStanic,
            'pager' => $pager
        ];
        echo view('data', $dataObalka);
    }
}
