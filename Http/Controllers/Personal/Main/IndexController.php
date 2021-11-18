<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;



class IndexController extends Controller
{

    public function __invoke()
    {
        //return '1111111111111';

        //dd($tags);

        return view('personal.main.index');
    }
}
