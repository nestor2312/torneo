<?php

namespace App\Http\Controllers;

use App\Models\gol;
use Illuminate\Http\Request;
use App\Models\Grupo;
class Homegols_userController extends Controller
{
    public function index()
    {
       $grupos = Grupo::all();
        $goles = gol::all()->sortByDesc('goles');
        return view('user.gols',compact('goles','grupos'));
    }
}
