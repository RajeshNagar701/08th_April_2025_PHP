<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller3 extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
         echo "Hi i am construct (Invoke) function that call automatic";
    }
}
