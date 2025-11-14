<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland; //importujeme model bundesland
use App\Models\Station;

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
          "stanice" => $stanice
        ];
        echo view ('stanice', $data);
    }
}
