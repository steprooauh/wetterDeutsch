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
    { //$id je id země
        $bundesland = new Bundesland();
        $zeme = $bundesland->find($id); 
        $station = new Station();
        $stanice = $station->where('bundesland', $id)->findAll();
        $data = [
            "zeme" => $zeme,
          "stanice" => $stanice
        ];
        //var_dump('stanice', $stanice);
        echo view ('stanice', $data);
    }

    public function data($id){
        $station = new Station();
        $stanice = $station->find($id);
        $data = new Data();
        $dataStanic = $data->where('Stations_ID', $id)->findAll();
        var_dump('dataStanic', $dataStanic);
    }
}
