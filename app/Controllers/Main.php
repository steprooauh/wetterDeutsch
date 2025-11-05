<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland; //importujeme model bundesland

class Main extends BaseController
{
    public function index()
    {
        $bundesland = new Bundesland(); //vytvoříme novou instanci třídy Bundesland
        $zeme = $bundesland->findAll(); //do zeme vypíšeme všechny data pomocí findAll()
        var_dump($zeme);
    }
}
