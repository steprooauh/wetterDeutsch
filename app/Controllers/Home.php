<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function hlavni()
    {
        return view('tabulka_bundesland');
    }
}
